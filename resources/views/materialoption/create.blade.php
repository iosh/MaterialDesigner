 
@extends('material.template')
@section('content')
    <h1>Create Material Option</h1>
    {!! Form::open([
        'route' => 'materialoption.store',
        'files' => true
    ]) !!}
        {!! Form::hidden('material_id',$id) !!}
    <div class="form-group">
        {!! Form::label('name', '*Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', '*Image:') !!}
        {!! Form::file('image',null,['class'=>'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop