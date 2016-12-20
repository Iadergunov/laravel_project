@extends('app')

@section('title')
    Finance
@stop


@section('content')
    <h1>Finance</h1>
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
                <td><div>{{ $transaction->date_time }}</div></td>
            </tr>
        @endforeach
        </tbody>
    </table>



@stop