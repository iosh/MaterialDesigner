@extends('material/template')

@section('content')
 <h1>Material Option for: <strong>{{$materialOptions->name}}</strong></h1>
 <a href="{{url('/materialoption/create',$materialOptions->id)}}" class="btn btn-success">Add Material Option</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Material ID</th>
         <th>Material Option ID</th>
         <th>Name</th>
         <th>Image</th>
         <th colspan="4">Actions</th>
     </tr>
     </thead>
     <tbody>
     @if (count($materialOptions) > 0) 
     @foreach ($materialOptions as $materialOption)
         <tr>
             <td>{{ $materialOption->material_id }}</td>
             <td>{{ $materialOption->material_option_id }}</td>
             <td>{{ $materialOption->name }}</td>
             <td><img src="{{asset('images/materialoption/'.$materialOption->image)}}" height="35" width="30"></td>
             <td><a href="{{url('materialoption/show',$materialOption->material_option_id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('materialoption.edit',$materialOption->material_option_id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['materialoption.destroy', $materialOption->material_option_id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach
     @else
       <tr>
             <td colspan="8">No option</td>
       </tr>
     @endif
     
     </tbody>

 </table>
@endsection