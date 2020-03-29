<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Post::orderBy('id', 'desc')->where('is_approved', 1)->get()
        ]);
    }

    public function post($id)
    {
        return view('post.post', [
            'post' => Post::findOrFail($id)
        ]);
    }

    public function add_get(Request $request)
    {
        $oldInput = $request->old();

        $form = app()->make('PostForm', [
            'title' => $oldInput['title'] ?? null,
            'content' => $oldInput['content'] ?? null
        ]);

        return view('post.add', [
            'form' => $form
        ]);
    }

    public function add_post(Request $request)
    {
        $validator = Validator::make($request->all(), Config::get('validations.addPostValidation'));

        if ($validator->fails()) {
            return redirect()
                ->route('post.add_get')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $data = $request->all();
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => Auth::user()->id
        ]);

        $image = $request->file('image');

        if ($image) {
            $extension = $image->getClientOriginalExtension();
            Storage::disk('images')->put($image->getFilename() . '.' . $extension,  File::get($image));

            Image::create([
                'mime' => $image->getClientMimeType(),
                'original_filename' => $image->getClientOriginalName(),
                'filename' => $image->getFilename() . '.' . $extension,
                'post_id' => $post->id
            ]);
        }

        return redirect()->route('post.post', $post->id);
    }

    public function edit_get(Request $request, $id)
    {
        $oldInput = $request->old();

        $post = Post::findOrFail($id);
        $form = app()->make('PostForm', [
            'title' => $oldInput['title'] ?? $post->title,
            'content' => $oldInput['content'] ?? $post->content
        ]);

        return view('post.edit', [
            'id' => $id,
            'form' => $form
        ]);
    }

    public function edit_post(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Config::get('validations.editPostValidation'));

        if ($validator->fails()) {
            return redirect()
                ->route('post.edit_get', $id)
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $data = $request->all();

        $post = Post::findOrFail($id)->fill([
            'title' => $data['title'],
            'content' => $data['content']
        ]);
        $post->save();

        $image = $request->file('image');

        if ($image) {
            $extension = $image->getClientOriginalExtension();
            Storage::disk('images')->put($image->getFilename() . '.' . $extension,  File::get($image));

            if ($post->image) {
                $post->image->delete();
            }

            Image::create([
                'mime' => $image->getClientMimeType(),
                'original_filename' => $image->getClientOriginalName(),
                'filename' => $image->getFilename() . '.' . $extension,
                'post_id' => $id
            ]);
        }

        return redirect()->route('post.post', $id);
    }

    public function not_approved()
    {
        return view('post.not-approved', [
            'posts' => Post::orderBy('id', 'desc')->where('is_approved', 0)->get()
        ]);
    }

    public function approve($id)
    {
        $post = Post::findOrFail($id);
        $post->is_approved = 1;
        $post->save();

        return redirect()->route('post.post', $id);
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('index');
    }
}
