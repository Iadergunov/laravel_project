@extends('app')

@section('title')
    Create new article
@stop

@section('content')
    <h1>Write a new article</h1>

    {!! Form::open(['action' => 'Articles_controller@store']) !!}
        @include('articles.partial._form', ['Submit_button_text' => 'Add article'])
    {!! Form::close() !!}

    @include('errors.list')
@stop