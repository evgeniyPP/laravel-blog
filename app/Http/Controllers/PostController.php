<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Post::orderBy('id', 'desc')->get()
        ]);
    }

    public function post($id)
    {
        return view('post.post', [
            'post' => Post::find($id)
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
        Post::create([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return redirect()->route('index');
    }

    public function edit_get(Request $request, $id)
    {
        $oldInput = $request->old();

        $post = Post::find($id);
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

        Post::find($id)->fill([
            'title' => $data['title'],
            'content' => $data['content']
        ])->save();

        return redirect()->route('post.post', $id);
    }
}
