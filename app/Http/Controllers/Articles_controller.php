<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
class Articles_controller extends Controller
{
    /**
     * Basic method to show all articles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(){
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show on particular article defined by id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        //Auth::user();
        $input = $request->all();
        $input['published_at'] = Carbon::now();
        Article::create($input);
        return redirect('articles');
    }

    /**
     * Edit method for article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

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
