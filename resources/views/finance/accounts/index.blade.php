@extends('app')

@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">Your accounts</div>
            @foreach($accounts as $account)
                <div class="body">
                    <p>{{ $account->name }}</p>
                </div>
                <div class="text-info">
                    <p>Current balance: {{ $account->balance }}</p>
                </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <a href="{{ action('Account_controller@create') }}"><button class="btn btn-primary">Create new account</button></a>
        </div>
    </div>
    @include('finance.partial._sidebar')
@stop