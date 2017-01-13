<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class Articles_controller extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => 'create']);
    }

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
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Article $article){
        return view('articles.show_article', compact('article'));
    }

    /**
     * Create a new article
     *
     */

    public function create(){
        if(Auth::guest()){
            return redirect('articles');
        }
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
        return redirect(action('Articles_controller@index'));
    }

    /**
     * Method to get edit form for article
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Article $article){
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
        return redirect(action('Articles_controller@index'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Article $article){
        $article->delete();
        return redirect(action('Articles_controller@index'));
    }
}
