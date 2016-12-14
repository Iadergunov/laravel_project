@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>{{ $article->title }}</h1>
    <div class="text-info">
        {{ $article->body }}
    </div>

@stop