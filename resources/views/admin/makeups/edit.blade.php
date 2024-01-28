@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Makeup'])

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
            <div class="card">
                <div class="card-header">
                    <h6>Edit Makeup - {{ $makeup->title }}</h6>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body">
                    <form action="{{ route('makeups.update', $makeup->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $makeup->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (RM)</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $makeup->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $makeup->description }}</textarea>
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
                                @if($makeup->image)
                                    <img src="{{ asset('storage/' . $makeup->image) }}" class="img-fluid border rounded" id="preview" alt="Current Image">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Makeup</button>
                        <a class="btn btn-primary" href="{{ route('makeups.index') }}"> Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
