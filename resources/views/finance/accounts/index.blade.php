@extends('app')

@section('content')
    <h1>Your accounts</h1>
    @foreach($accounts as $account)
        <div class="body">
            <p>{{ $account->name }}</p>
        </div>
        <div class="text-info">
            <p>Current balance: {{ $account->balance }}</p>
        </div>
    @endforeach
    <div class="col-md-12">
        <a href="{{ action('Account_controller@create') }}"><button class="btn btn-primary">Create new account</button></a>
    </div>
@stop