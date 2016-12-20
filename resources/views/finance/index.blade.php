@extends('app')

@section('title')
    Finance
@stop


@section('content')
    <h1>Finance</h1>
    <a href="{{action('Finance_controller@index')}}">All</a>
    <a href="{{action('Finance_controller@today_transactions')}}">Today</a>
    <a href="{{action('Finance_controller@yesterday_transactions')}}">Yesterday</a>
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
        {{ $sum = 0}}
        @foreach($transactions as $transaction)
            {{ $sum = $sum + $transaction->amount }}
            <tr class="active">
                <td><div>{{ $transaction->name }}</div></td>
                <td><div>{{ $transaction->amount }}</div></td>
                <td><div>{{ $transaction->date_time->format('d-m-Y') }}</div></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
            <tr class="active">
                <td><div>Sum</div></td>
                <td><div>{{ $sum }}</div></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="col-md-12">
        <a href="{{ action('Finance_controller@create_transaction') }}"><button class="btn btn-primary">Create new transaction</button></a>
    </div>

@stop