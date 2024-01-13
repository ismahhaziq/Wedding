
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Timetable</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('timetables.create') }}"> Add New Timetable</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Day</th>
            <th>Subject</th>
            <th>Hall</th>
            <th>Time</th>
            <th width="280px">Action</th>
        </tr>
        <tbody>
        @php
            $count = 1;
        @endphp

        @foreach ($timetables as $t)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $t->day ? $t->day->day_name : 'N/A'}}</td>
            <td>{{ optional($t->subject)->subject_code }} - {{optional($t->subject)->subject_name  }}</td>
            <td>{{ optional($t->hall)->lecture_hall_name}} </td>
            <td>{{ $t->time_from->format('h:i A') . '-' . $t->time_to->format('h:i A')}}</td>
            <td>
                <form action="{{ route('timetables.destroy',$t->id) }}" method="POST">
   
                <a class="btn btn-info" href="{{ route('timetables.show',$t->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('timetables.edit',$t->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
