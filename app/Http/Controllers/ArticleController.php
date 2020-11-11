<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $date = Carbon::now()->format('Y');
        return view('guest.posts.index', compact('articles'))->with('date', $date);
    }
}
