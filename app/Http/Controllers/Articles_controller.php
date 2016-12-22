<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class Articles_controller extends Controller
{
    /**
     * Basic method to show all articles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(){
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show on particular article defined by id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show($id){
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
        $input = $request->all();
        $article = new Article($input);
        //assign user_id to active user
        Auth::user()->articles()->save($article);
        //Article::create($input);
        return redirect('articles');
    }

    /**
     * Method to get edit form for article
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id){
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Method to save changed article
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ArticleRequest $request){
        $input = $request->all();
        $article = Article::findOrFail($id);
        $article->update($input);
        return redirect('articles');
    }

    public function destroy($id){
        $article = Article::findOrFail($id);
        $article->forceDelete();
        return redirect('articles');
    }
}
