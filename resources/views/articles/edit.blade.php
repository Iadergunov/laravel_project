@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>Edit: {{$article->title}}</h1>
    {!! Form::model($article, [ 'method' => 'PATCH', 'action' => ['Articles_controller@update', $article->id]]) !!}
        @include('articles.partial._form', ['Submit_button_text' => 'Update article'])
    {!! Form::close() !!}
    @include('errors.list')
@stop