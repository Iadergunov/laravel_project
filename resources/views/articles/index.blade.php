@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>Articles</h1>
    @foreach($articles as $article)
        <article>
            <h2><a href="{{action('Articles_controller@show_article', [$article->id])}}">{{ $article->title }}</a></h2>
        </article>
        <div class="body">
            <p>{{ $article->body }}</p>
        </div>
        <form method="post" action="{{action('Articles_controller@delete', [$article->id])}}"><button class="btn btn-danger fa-trash">Delete article</button></form>
    @endforeach
    <div class="col-md-12">
        <a href="{{ action('Articles_controller@create') }}"><button class="btn btn-primary">Create new article</button></a>
    </div>

@stop
