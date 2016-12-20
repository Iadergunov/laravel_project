@extends('app')

@section('title')
    Create new transaction
@stop

@section('content')
    <h1>Add a new transaction</h1>

    {!! Form::open(['action' => 'Finance_controller@store_transaction']) !!}
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
            {!! Form::submit('Add transaction', ['class' => '"btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}

    @include('errors.list')
@stop