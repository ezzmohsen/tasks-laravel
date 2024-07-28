<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

        $posts = [
            'first post',
            'second post',
            'third post',
            'fourth post',
        ];


        return view('posts', ['posts' => $posts]);
    }
}
