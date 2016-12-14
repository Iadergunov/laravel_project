@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>Edit: {{$article->title}}</h1>
    <form class="form-horizontal" method="post" action="{{ action('Articles_controller@update', [$article->id]) }}">
        @include('articles.partial._form', ['Submit_button_text' => 'Update article'], ['Name_button' => 'edit_article'])
    </form>
    @include('errors.list')
@stop