<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Amount</th>
        <th>Method</th>
        <th>Group</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr class="active">
            <td><div>{{ $transaction->name }}</div></td>
            <td><div>{{ $transaction->amount }}</div></td>
            <td>{{ $transaction->account->name }}</td>
            <td><a href="{{action('Finance_groups_controller@show', [$transaction->finance_group->id])}}">{{ $transaction->finance_group->name }}</a></td>
            <td><div>{{ $transaction->date_time->format('d-m-Y') }}</div></td>
            <td>
                <div>
                    {!! Form::open([ 'method' => 'DELETE', 'action' => ['Transactions_controller@destroy', $transaction->id]]) !!}
                    <button class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></button>
                    {!! Form::close() !!}
                </div>
            </td>
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