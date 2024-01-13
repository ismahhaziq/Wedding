@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Subject</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('subjects.create') }}"> Add New Subject</a>
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
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Lecturer Name</th>
            <th width="280px">Action</th>
        </tr>
        <tbody>
        @php
            $count = 1;
        @endphp

        @foreach ($subjects as $s)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $s->subject_code }}</td> <!-- tukar ikut dalam Models/Subject.php -->
            <td>{{ $s->subject_name }}</td>
            <td>{{ $s->lecturer_name }}</td>
            <td>
                <form action="{{ route('subjects.destroy',$s->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('subjects.show',$s->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('subjects.edit',$s->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection