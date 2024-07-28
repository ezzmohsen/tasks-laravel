<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        if ($blog) {
            return view('edit', compact('blog'));
        } else {
            return redirect('/blogs')->with('error', 'Blog post not found!');
        }
    }

    public function updateData(Request $request, $id)
    {
        $blog = Blog::find($id);

        if ($blog) {
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->save();

            return redirect('/blogs')->with('success', 'Blog post updated successfully!');
        } else {
            return redirect('/blogs')->with('error', 'Blog post not found!');
        }
    }

}
