<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        dump('index page');
        // $categories = PostCategory::get();
        // $posts = Post::with('postCategory')->latest()->paginate(10);
        // return view('post.post', compact('posts', 'categories'));
    }
}
