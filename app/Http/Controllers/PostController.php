<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::get();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function posted(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->post()->create()([
            'body' => $request->body
        ]);

        return back();
    }
}
