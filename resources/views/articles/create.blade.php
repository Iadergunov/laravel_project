@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>Write new article</h1>
    <form class="form-horizontal" method="post" action="{{ action('Articles_controller@store') }}">
        @include('articles.partial._form', ['Submit_button_text' => 'Add article', 'Name_button' => 'add_article'])
    </form>
    @include('errors.list')
@stop