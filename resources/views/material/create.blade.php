 
@extends('material.template')
@section('content')
    <h1>Create Material</h1>
    {!! Form::open([
        'route' => 'material.store',
        'files' => true
    ]) !!}
    <div class="form-group">
        {!! Form::label('*name', 'Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('*description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('*thumbnail', 'Image:') !!}
        {!! Form::file('thumbnail',null,['class'=>'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop