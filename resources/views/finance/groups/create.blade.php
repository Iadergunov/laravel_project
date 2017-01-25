@extends('app')

@section('title')
    Create new groups
@stop

@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <h2>Create a new group</h2>

        {!! Form::open(['action' => 'Finance_groups_controller@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create new group', ['class' => '"btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @include('finance.partial._sidebar')
    @include('errors.list')
@stop