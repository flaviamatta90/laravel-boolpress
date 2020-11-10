<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        $articles = Article::where('user_id', $user_id)->get();

        return view('admin.posts.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title'=> 'required',
            'slug' => 'required|unique:articles',
            'content' => 'required',
            'image' => 'image'

        ]);

        $id = Auth::id();

        $nameOriginal = $data['image']->getClientOriginalName();

        /* $path  = Storage::putFileAs("images/$id", $data['image'], $nameOriginal); */
        $path  = Storage::disk('public')->putFileAs("images/$id", $data['image'], $nameOriginal);


        /* da una path x */
        /* $path  = Storage::disk('public')->put("images/$id", $data['image']); */

        $newArticle = new Article;
        $newArticle->user_id = Auth::id();
        $newArticle->title = $data["title"];
        $newArticle->slug = $data["slug"];
        $newArticle->content = $data["content"];
        $newArticle->image = $path;

        $newArticle->save();

        return redirect()->route('admin.posts.show', $newArticle->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();

        return view('admin.posts.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.posts.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->all();

        $request->validate([
            'title'=> 'required',
            'slug' => 'required|unique:articles',
            'content' => 'required',
            'image' => 'image'

        ]);


        $id = Auth::id();

        $path  = Storage::disk('public')->put("images/$id", $data['image']);

        $article = Article::find($id);
        $article->update($data);

        return redirect()->route("admin.posts.show", $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, $id)
    {
        $article = Article::find($id);

        $article->delete();
        return redirect()->route("admin.posts.index")->with('success', 'Pattern was deleted successfully.');
    }
}
