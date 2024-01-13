@extends('layouts.userapp')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Todo List</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Add Todo
            </a>

            @if(count($todos) > 0)
                <ul class="list-group">
                    @foreach($todos as $todo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <!-- Todo text with strikethrough if completed -->
                                <input type="checkbox" class="form-check-input me-2 todo-checkbox" id="todoCheckbox{{ $todo->id }}" data-todo-id="{{ $todo->id }}" {{ $todo->status == 1 ? 'checked' : '' }}>
                                <label for="todoCheckbox{{ $todo->id }}" class="text" style="{{ $todo->status == 1 ? 'text-decoration: line-through;' : '' }}">
                                    {{ $todo->text }}
                                </label>
                                <!-- Status -->
                                <small class="badge badge-{{ $todo->status == 1 ? 'success' : 'danger' }}">
                                    {{ $todo->status == 1 ? 'Completed' : 'Incomplete' }}
                                </small>
                            </div>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No todos available.</p>
            @endif
        </div>
    </div>

    <style>
        .form-check-input {
            width: 20px;
            height: 20px;
            border: 1px solid #ced4da; /* Add outline color */
            border-radius: 3px; /* Add border-radius for a rounded look */
        }

        .form-check-input:checked {
            background-color: #5bc0de; /* Add background color for checked state */
            border-color: #5bc0de; /* Add border color for checked state */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.todo-checkbox');

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    const todoId = checkbox.getAttribute('data-todo-id');
                    const isChecked = checkbox.checked;

                    // Update the text style based on checkbox state
                    const todoText = document.querySelector(`label[for=todoCheckbox${todoId}]`);
                    todoText.style.textDecoration = isChecked ? 'line-through' : '';

                    // Make an AJAX request to update the status in the database
                    // Replace 'your_update_route' with the actual route for updating the status
                    fetch(`/your_update_route/${todoId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            status: isChecked ? 1 : 2,
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response if needed
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });
    </script>
@endsection
