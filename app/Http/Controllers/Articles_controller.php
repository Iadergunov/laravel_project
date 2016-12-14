<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class Articles_controller extends Controller
{
    public function index(){
        //$articles = Article::latest()->get();
        $articles =[];
        return view('articles.index', compact('articles'));
    }

    /**
     * Show on particular article defined by id
     */

    public function show_article($id){
        $article = Article::findOrFail($id);

        return view('articles.show_article', compact('article'));
    }

    /**
     * Create a new article
     *
     */

    public function create(){
        return view('articles.create');
    }

    /**
     * Save a new article
     */

    public function store(ArticleRequest $request){
        Auth::user();
        $input = $request->all();
        Article::create($input);
        return redirect('articles');
    }

    public function edit($id){
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request){
        $input = $request->all();
        $article = Article::findOrFail($id);
        $article->update($input);
        return redirect('articles');
    }

    public function delete($id){
        $article = Article::findOrFail($id);
        $article->forceDelete();
        return redirect('articles');
    }
}
