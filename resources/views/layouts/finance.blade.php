@extends('app')
@section('title')
    Finance
@stop
@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <div class="panel panel-default">
            @yield('some')
        </div>
    </div>
    @include('finance.partial._sidebar')
@stop