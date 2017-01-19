@extends('app')

@section('title')
    Create new transaction
@stop

@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <h2>Add a new transaction</h2>

        {!! Form::open(['action' => 'Transactions_controller@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('amount', 'Amount:') !!}
                {!! Form::text('amount', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('date_time', 'Date:') !!}
                {!! Form::input('date', 'date_time', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('account_id', 'Payment method:') !!}
                {!! Form::select('account_id', $accounts, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add transaction', ['class' => '"btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}
        @include('errors.list')
    </div>
    @include('finance.partial._sidebar')
@stop