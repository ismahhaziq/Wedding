@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create New Makeup'])
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
            <div class="card">
                <div class="card-header">
                    <h6>Create New Makeup</h6>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body">
                    <form action="{{ route('makeups.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (RM)</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
                        <button type="submit" class="btn btn-primary">Create Makeup</button>
                        <a class="btn btn-primary" href="{{ route('makeups.index') }}"> Back</a>
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
