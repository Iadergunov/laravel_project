@extends('app')

@section('title')
    Finance
@stop


@section('content')
    @include('finance.partial._header')
    <div class="row">
        <div class="col-sm-9">

        </div>
        @include('finance.partial._sidebar')
    </div>
@stop