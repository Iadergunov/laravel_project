@extends('layouts.finance')

@section('some')
    <div class="panel-heading">{{$finance_group->name}} transactions</div>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Group</th>
            <th>Method</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr class="active">
                <td><div>{{ $transaction->name }}</div></td>
                <td><div>{{ $transaction->amount }}</div></td>
                <td><div>{{ $transaction->date_time->format('d-m-Y') }}</div></td>
                <td>{{ $transaction->finance_group->name }}</td>
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

    <div>
        <a href="{{ action('Transactions_controller@create') }}"><button class="btn btn-primary">Create new transaction</button></a>
    </div>
@stop