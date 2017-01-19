@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>{{ $article->title }}</h1>
    <div class="text-info">
        {{ $article->body }}
    </div>
    @unless($article->tags->isEmpty())
    <div>
        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    </div>
    @endunless
    <div class="form-horizontal">
        <a href="{{ action('Articles_controller@edit', [$article->id]) }}">
            <button class="btn btn-primary"><i class="fa fa-btn fa-pencil"></i>Change article</button>
        </a>
        {!! Form::open([ 'method' => 'DELETE', 'action' => ['Articles_controller@destroy', $article->id]]) !!}
            <button class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete article</button>
        {!! Form::close() !!}
    </div>
@stop