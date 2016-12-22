@extends('app')

@section('title')
    Transactions
@stop


@section('content')
    <h1>Finance</h1>
    <a href="{{action('Transactions_controller@index')}}">All</a>
    <a href="{{action('Transactions_controller@today_transactions')}}">Today</a>
    <a href="{{action('Transactions_controller@yesterday_transactions')}}">Yesterday</a>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Type</th>
            <th>Method</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr class="active">
                <td><div>{{ $transaction->name }}</div></td>
                <td><div>{{ $transaction->amount }}</div></td>
                <td><div>{{ $transaction->date_time->format('d-m-Y') }}</div></td>
                <td></td>
                <td>{{ $transaction->account->name }}</td>
            </tr>
        @endforeach
            <tr class="active">
                <td><div>Sum</div></td>
                <td><div>{{ $transactions->sum('amount') }}</div></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="col-md-12">
        <a href="{{ action('Transactions_controller@create') }}"><button class="btn btn-primary">Create new transaction</button></a>
    </div>

@stop