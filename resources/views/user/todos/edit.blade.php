@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit To-Do'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Todo</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.update', $todo->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="text">Todo Text:</label>
                            <input type="text" name="text" class="form-control" value="{{ $todo->text }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="checkbox" name="status" value="1" {{ $todo->status ? 'checked' : '' }}> Completed
                        </div>
                        <!-- Add form fields for other properties -->
                        <button type="submit" class="btn btn-primary">Update Todo</button>
                        <a class="btn btn-secondary" href="{{ route('todos.index') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
