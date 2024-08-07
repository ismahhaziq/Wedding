@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Add-On Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>List of Add-On</h6>
                        <div class="mb-2">
                            <!-- Add New Service Button -->
                            <a href="{{ route('services.create') }}" class="btn btn-primary">Add New Add-On</a>
                        </div>
                    </div>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(count($services) > 0)
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            @foreach ($services as $service)
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Service Image -->
                                             <div class="larger-image-container">
                                                <img src="{{ asset('storage/' . $service->image) }}"  class="avatar me-3" alt="Current Image">
                                            </div>

                                            <!-- Service Title -->
                                            <h5 class="text-black-bold p-2">{{ $service->title }}</h5>

                                            <div class="card-text">
                                                <!-- Service Price -->
                                                <strong>Price:</strong> RM{{ $service->price }}<br><br>
                                                <!-- Status -->
                                                <div class="status" style="background-color: {{ $service->status == 1 ? 'green' : 'red' }}">
                                                    {{ $service->status == 1 ? 'Available' : 'Unavailable' }}
                                                </div>
                                            </div>

                                            <div class="text-left mt-2">
                                                <!-- Edit and Delete Buttons -->
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('services.edit', $service->id) }}" title="Edit">
                                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">No Makeup Added</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .larger-image-container {
            width: 100%;
            height: 300px; /* Adjust the height as needed */
            overflow: hidden;
        }

        .larger-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .status {
            color: white;
            padding: 5px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
@endsection
