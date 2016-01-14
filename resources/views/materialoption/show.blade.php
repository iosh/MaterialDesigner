@extends('material/template')

@section('content')
    <h1>Material {{$materialOptions->name}}</h1>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">thumbnail</label>
            <div class="col-sm-10">
                <img src="{{asset('images/materialoption/'.$materialOptions->image)}}" height="180" width="150" class="img-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder="{{$materialOptions->name}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('materialoption',$materialOptions->material_id)}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop