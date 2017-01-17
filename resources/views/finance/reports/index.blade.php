@extends('app')

@section('title')
    Finance
@stop


@section('content')
    @include('finance.partial._header')
    <div class="row">
        <div class="col-sm-9">
            <h2>There will be reports</h2>
        </div>
        @include('finance.partial._sidebar')
    </div>
@stop