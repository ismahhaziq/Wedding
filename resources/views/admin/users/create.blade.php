@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create New User'])

    <style>
        .current-image-container {
            max-width: 300px; /* Set your desired maximum width */
            margin-top: 10px; /* Add margin for spacing */
            border: 1px solid #ddd; /* Add border */
            padding: 10px; /* Add padding */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }
    </style>

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Create User</h6>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul style="font-weight: normal; color: #721c24;"> <!-- Adjust font-weight and color as needed -->
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body px-4 pt-4">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Other form fields -->

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                        </div>

                        <div class="mb-3">
                            <label for="user_type" class="form-label">Role</label>
                            <select class="form-select" id="user_type" name="user_type">
                                <option value="admin" {{ old('user_type') === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('user_type') === 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="password">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password" name="password_confirmation" required autocomplete="password_confirmation">
                        </div>

                        <!-- Add file input for image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image" onchange="previewImage(this)">
                        </div>

                        <!-- Display image preview -->
                        <div class="mb-3">
                            <label for="preview" class="form-label">Image Preview</label>
                            <div id="previewContainer" class="current-image-container">
                                <img id="preview" class="img-fluid border rounded" alt="Image Preview">
                            </div>
                        </div>

                        <!-- Add other fields as needed -->

                        <button type="submit" class="btn btn-primary">Create User</button>
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to preview image
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var previewContainer = document.getElementById('previewContainer');

            previewContainer.style.display = 'block';

            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>

@endsection
