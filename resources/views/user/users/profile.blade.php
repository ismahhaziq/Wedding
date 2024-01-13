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
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                        <a href="{{ route('users.edit_profile', ['user' => auth()->user(), 'profile_update' => 'true']) }}" class="btn btn-primary btn-sm ms-auto">Edit</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" name="username" value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{auth()->user()->email}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone Number</label>
                                        <input class="form-control" type="text" name="text"
                                            value="{{ auth()->user()->phone_number }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
