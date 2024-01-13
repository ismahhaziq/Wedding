@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'To-Do Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>List of To-Do</h6>
                        <div class="mb-2">
                            <a href="{{ route('todos.create') }}" class="btn btn-primary">Add New To-Do</a>
                        </div>
                    </div>
                </div>

                @if(count($todos) > 0)
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            <div class="col mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <!-- Todo text with strikethrough if completed -->
                                        <label for="todoCheckbox{{ $todo->id }}" class="text custom-text-size" style="{{ $todo->status ? 'text-decoration: line-through;' : '' }}">
                                            {{ $todo->text }}
                                        </label>
                                        <!-- Status -->
                                        <small class="badge badge-{{ $todo->status ? 'success' : 'danger' }}">
                                            {{ $todo->status ? 'Completed' : 'Incomplete' }}
                                        </small>
                                    </div>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">No todos available.</p>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Add this style in your CSS or within a style tag in the head section */
        .custom-text-size {
            font-size: 15px; /* Adjust the value based on your preference */
        }
    </style>
@endsection
