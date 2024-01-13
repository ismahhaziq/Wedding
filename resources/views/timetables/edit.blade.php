@extends('layouts.template')
   
   @section('content')
       <div class="row">
           <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                   <h2>Edit Timetable</h2>
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
     
       <form action="{{ route('timetables.update',$timetable->id) }}" method="POST">
           @csrf
           @method('PUT')
   
           <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-6">
           <strong>Day:</strong>     
           <select class="form-control" name="day_id">
           @foreach ($days as $id => $name)
           <option value="{{$id}}" {{ (isset($timetable['days_id']) && $timetable['days_id'] == $id) ? ' selected' : '' }}>{{$name}}</option>                        
           @endforeach
               </select>
           </div>
           <br>        
           <br>
           </div>
           <br>
           <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-6">
           <strong>Subject:</strong>    
           <select class="form-control" name="subject_id">
                    @foreach ($subjects as $id => $full_name )
                        <!-- ^^^^^^^
                 ni ikut declaration dalam edit() dalam StudentTimeTableController    -->
                 <option value="{{$id}}" {{ (isset($timetable['subjects_id']) && $timetable['subjects_id'] == $id) ? ' selected' : '' }}>{{$full_name}}</option>                        
                    {{ $full_name }}
                </option>             
                 @endforeach
               </select>
           </div>
           <br>        
           
           </div>
           <br>

           <div class="row">
               <div class="col-xs-6 col-sm-6 col-md-6">
               
               <div class="form-group">
               <strong>Hall:</strong>
                   <select class="form-control" name="lecture_hall_id">
                   @foreach ($halls as $id => $name)
                   <option value="{{$id}}" {{ (isset($timetable['halls_id']) && $timetable['halls_id'] == $id) ? ' selected' : '' }}>{{$name}}</option>                        
                        <!-- masih tak berjaya, tak tunjuk data yang tersedia, tapi tunjuk data paling awal wujud dalam database ikut turutan  -->
                        @endforeach
                   </select>
               </div>
               </div>
           </div>

           <div class="row">
               <div class="col-xs-6 col-sm-6 col-md-6">
               
               <div class="form-group">
               <strong>Part:</strong>
                   <select class="form-control" name="group_id">
                    @foreach ($groups as $id => $name)
                    <option value="{{$id}}" {{ (isset($timetable['groups_id']) && $timetable['groups_id'] == $id) ? ' selected' : '' }}>{{$name}}</option>                        
                        @endforeach
                   </select>
               </div>
               </div>
           </div>
            

           <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                       <strong>Time From:</strong>
                       <input type="time" name="time_from" class="form-control" value="{{ $timetable->time_from->format('H:i')  }}" placeholder="Time From">
                   </div>
           </div>
            </div>
            <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                       <strong>Time To:</strong>
                       <input type="time" name="time_to" class="form-control" value="{{ $timetable->time_to->format('H:i') }}"placeholder="Time To">
                   </div>
           </div>
           </div>
           <br>
           <br>
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Submit</button>
                   <a class="btn btn-primary" href="{{ route('timetables.index') }}"> Back</a>
               </div>
           </div>
      
       </form>
   @endsection
   