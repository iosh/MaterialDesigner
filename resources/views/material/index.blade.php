@extends('material/template')

@section('content')
 <h1>Material</h1>
 <a href="{{url('/material/create')}}" class="btn btn-success">Create Material</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>Name</th>
         <th>Descriptison</th>
         <th>Thumbs</th>
         <th colspan="4">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($materials as $material)
         <tr>
             <td>{{ $material->material_id }}</td>
             <td>{{ $material->name }}</td>
             <td>{{ $material->description }}</td>
             <td><img src="{{asset('images/material/'.$material->thumbnail)}}" height="35" width="30"></td>
             <td><a href="{{url('material',$material->material_id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('material.edit',$material->material_id)}}" class="btn btn-warning">Update</a></td>
             <td><a href="{{url('materialoption',$material->material_id)}}" class="btn btn-primary">Material Option</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['material.destroy', $material->material_id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection