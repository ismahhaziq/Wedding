@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Hall</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('halls.create') }}"> Add New Hall</a>
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
            <th>Hall Name</th>
            <th>Hall Place</th>
            <th width="280px">Action</th>
        </tr>
        <tbody>
        @php
            $count = 1;
        @endphp
        
        @foreach ($halls as $s)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $s->lecture_hall_name }}</td>
            <td>{{ $s->lecture_hall_place }}</td>
            <td>
                <form action="{{ route('halls.destroy',$s->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('halls.show',$s->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('halls.edit',$s->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection