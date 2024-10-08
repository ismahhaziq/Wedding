@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create New Add-On'])
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
                    <h6>Create New Add-On</h6>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Unavailable</option>
                            </select>
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
                        <button type="submit" class="btn btn-primary">Create Add-On</button>
                        <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
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
