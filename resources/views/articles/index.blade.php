@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>Articles</h1>
    @foreach($articles as $article)
        <article>
            <h2><a href="{{action('Articles_controller@show', [$article->id])}}">{{ $article->title }}</a></h2>
        </article>
        <div class="body">
            <p>{{ $article->body }}</p>
        </div>
        <div class="text-info">
            <p>Written by: {{ $article->user->name }}</p>
        </div>
    @endforeach

        <!-- Show button create article if user logged in -->
    @if (Auth::user())
        <div class="col-md-12">
            <a href="{{ action('Articles_controller@create') }}"><button class="btn btn-primary">Create new article</button></a>
        </div>
    @else
        <div class="col-md-12">
            <p>If you want to create your own article, please <a href="{{action('Auth\LoginController@login')}}"> Login</a> or
                <a href="{{ action('Auth\RegisterController@register') }}"> Register</a>
            </p>
        </div>
    @endif

@stop
