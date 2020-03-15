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
        return view('single', ['id' => $id]);
    }

    public function add()
    {
        return view('add');
    }

    public function edit($id)
    {
        return view('edit', ['id' => $id]);
    }
}