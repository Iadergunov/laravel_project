@extends('app')

@section('title')
    Create new account
@stop

@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <h2>Write a new article</h2>

        {!! Form::open(['action' => 'Account_controller@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('balance', 'Starting Balance:') !!}
                {!! Form::text('balance', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create new account', ['class' => '"btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @include('finance.partial._sidebar')
    @include('errors.list')
@stop


