@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Hall</h2>
        </div>
       
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('halls.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Hall Name:</strong>
                <input type="text" name="lecture_hall_name" class="form-control" placeholder="Hall Name">
             </div>      <!--yang 'name' ni, pastikan ikut sebiji dalam database. -->
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Hall Place:</strong>
                <input type="text" class="form-control" name="lecture_hall_place" placeholder="Hall place">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        
                <a class="btn btn-primary" href="{{ route('halls.index') }}"> Back</a>
        </div>
    </div>
   
</form>
@endsection
