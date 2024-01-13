@extends('layouts.userapp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="row mt-4 card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative" style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%;">
                        @if(auth()->user()->image)
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" class="w-100 h-100 object-cover" alt="Current Image">
                        @else
                            <img src="{{ asset('storage/images/users/default_user_image.jpg') }}" class="w-100 h-100 object-cover" alt="Default Image">
                        @endif
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name}}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->user_type}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form  id="profileForm" action="{{ route('users.update_profile', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0">Edit Profile</p>
                                <div>
                                     <a href="#" class="btn btn-primary" id="saveButton">Save</a>
                                    <a class="btn btn-outline-primary" href="{{ route('users.profile') }}">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{  $user->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone Number</label>
                                        <input class="form-control" type="text" name="phone_number" value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Image</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Profile Image</label>
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
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
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

            document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('saveButton').addEventListener('click', function () {
            document.getElementById('profileForm').submit();
        });
    });
    </script>

    
    <style>
        .current-image-container {
            max-width: 300px; /* Set your desired maximum width */
            margin-top: 10px; /* Add margin for spacing */
            border: 1px solid #ddd; /* Add border */
            padding: 10px; /* Add padding */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }

            .custom-button {
        width: 80px; /* Adjust the width as needed */
    }

    </style>
@endsection
