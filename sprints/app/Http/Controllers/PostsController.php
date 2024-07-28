<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

        // $posts = [
        //     'first post',
        //     'second post',
        //     'third post',
        //     'fourth post',
        // ];

        $posts = Blog::all();

        // Pass the data to the view
        return view('posts', compact('posts'));



    }
}
