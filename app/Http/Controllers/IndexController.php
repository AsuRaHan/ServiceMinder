<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Show the Home page.
     */
    public function home(): View
    {
        $posts = Article::query()
            ->orderBy("created_at", "DESC")->limit(3)->get();

        return view('home.index', [
            "posts" => $posts,
        ]);
    }
}
