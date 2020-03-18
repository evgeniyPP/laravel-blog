<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function single($id)
    {
        return view('post.single', ['id' => $id]);
    }

    public function add()
    {
        return view('post.add');
    }

    public function edit($id)
    {
        return view('post.edit', ['id' => $id]);
    }
}
