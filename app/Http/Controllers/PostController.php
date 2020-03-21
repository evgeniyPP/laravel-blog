<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('index.index', [
            'posts' => DB::table('posts')->orderBy('id', 'desc')->get()
        ]);
    }

    public function post($id)
    {
        return view('post.post', [
            'post' => DB::table('posts')->where('id', $id)->first()
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
        $validator = Validator::make($request->all(), Config::get('constants.addPostValidation'));

        if ($validator->fails()) {
            return redirect()
                ->route('post.add_get')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $data = $validator->getData();
        DB::table('posts')->insert(
            ['title' => $data['title'], 'content' => $data['content']]
        );

        return redirect()->route('index');
    }

    public function edit_get(Request $request, $id)
    {
        $oldInput = $request->old();

        $post = DB::table('posts')->where('id', $id)->first();
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
        $validator = Validator::make($request->all(), Config::get('constants.editPostValidation'));

        if ($validator->fails()) {
            return redirect()
                ->route('post.edit_get', $id)
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $data = $validator->getData();
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['title' => $data['title'], 'content' => $data['content']]
            );

        return redirect()->route('post.post', $id);
    }
}
