<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Article::orderBy("created_at", "DESC")->paginate(6);

        return view('posts.index', [
            "posts" => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Article::findOrFail($id);

        return view('posts.show', [
            "post" => $post,
        ]);
    }
}
