<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
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
        $tags = Tag::pluck('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article
     */

    public function store(ArticleRequest $request){
        //assign user_id to active user
        $article = Auth::user()->articles()->create($request->all());
        //assign tags
        $this->syncTags($article, $request->input('tagList'));
        return redirect(action('Articles_controller@index'));
    }

    /**
     * Method to get edit form for article
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Article $article){
        $tags = Tag::pluck('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Method to save changed article
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ArticleRequest $request){
        $article = Article::findOrFail($id);
        $article->update($request->all());
        $this->syncTags($article, $request->input('tagList'));
        return redirect(action('Articles_controller@index'));
    }

    /**
     * Sync up the list of tags in DB.
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags){
        $article->tags()->sync($tags);
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
