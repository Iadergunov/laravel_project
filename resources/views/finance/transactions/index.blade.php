@extends('app')

@section('title')
    Transactions
@stop


@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <h2>Transactions</h2>
        <a href="{{action('Transactions_controller@index')}}">All</a>
        <a href="{{action('Transactions_controller@today_transactions')}}">Today</a>
        <a href="{{action('Transactions_controller@yesterday_transactions')}}">Yesterday</a>
        @include('finance.partial._table', $transactions)
        <div>
            <a href="{{ action('Transactions_controller@create') }}"><button class="btn btn-primary">Create new transaction</button></a>
        </div>
    </div>
    @include('finance.partial._sidebar')


@stop