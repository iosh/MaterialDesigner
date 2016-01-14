
@extends('material.template')

@section('content')
    <h1>Update Material</h1>
    {!! Form::model($materialOption, array(
            'method' => 'PATCH',
            'route' => array('materialoption.update',$materialOption->material_option_id),
            'files' => true
            )
    ) !!}
    <div class="form-group">
        {!! Form::label('Material', 'Material:') !!}
        {!! Form::select('material_id', $materials,[$materialOption->material_id],['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', '*Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image',null,['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop