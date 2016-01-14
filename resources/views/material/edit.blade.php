@extends('material.template')
@section('content')
    <h1>Update Material</h1>
    {!! Form::model($material, array(
            'method' => 'PATCH',
            'route' => array('material.update',$material->material_id),
            'files' => true
            )
    ) !!}
    <div class="form-group">
        {!! Form::label('name', '*Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('*description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('thumbnail', 'Thumbnail:') !!}
        {!! Form::file('thumbnail',null,['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop