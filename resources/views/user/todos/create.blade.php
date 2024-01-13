@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create To-Do'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Todo</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="text">Todo Text:</label>
                            <input type="text" name="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="checkbox" name="status" value="1"> Completed
                        </div>
                        <!-- Add form fields for other properties -->
                        <button type="submit" class="btn btn-primary">Create Todo</button>
                        <a class="btn btn-secondary" href="{{ route('todos.index') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
