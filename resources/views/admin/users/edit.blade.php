@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])

    <style>
        .current-image-container {
            max-width: 300px; /* Set your desired maximum width */
            margin-top: 10px; /* Add margin for spacing */
            border: 1px solid #ddd; /* Add border */
            padding: 10px; /* Add padding */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }
    </style>

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

        // Trigger previewImage function when the page loads
        window.onload = function () {
            // Assuming the 'image' element exists in the DOM
            var imageInput = document.getElementById('image');
            if (imageInput && imageInput.files.length > 0) {
                previewImage(imageInput);
            }
        };
    </script>  


    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit User</h6>
                </div>

                <div id="alert">
                    @include('components.alert')
                </div>

                <div class="card-body px-4 pt-4">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <!-- Other form fields -->

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                        </div>

                        <div class="mb-3">
                            <label for="user_type" class="form-label">Role</label>
                            <select class="form-select" id="user_type" name="user_type">
                                <option value="admin" {{ $user->user_type === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->user_type === 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        <!-- Add file input for image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image" onchange="previewImage(this)">
                        </div>

                        <!-- Display current or selected image with border and max size -->
                        <div class="mb-3">
                            <label for="current_image" class="form-label">Current Image</label>
                            <div class="current-image-container">
                                @if($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" class="img-fluid border rounded" id="preview" alt="Current Image">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>

                        <!-- Add other fields as needed -->

                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

 


@endsection