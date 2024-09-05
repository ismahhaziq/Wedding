@extends('layouts.userapp')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Add-On Management'])
<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h6>List of Add-On</h6>
                </div>
            </div>
            <div id="alert">
                @include('components.alert')
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @if(count($services) > 0)
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    @foreach ($services as $service)
                    @if ($service->status == 1)
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <!-- Service Image -->
                                <div class="larger-image-container">
                                    <img src="{{ asset('storage/' . $service->image) }}" class="avatar me-3"
                                        alt="Current Image">
                                </div>0

 0                               <!-- Service Title -->
                                <h5 class="text-black-bold p-2">{{ $service->title }}</h5>

                                <div class="card-text">
                                    <!-- Service Price -->
                                    <strong>Price:</strong> RM{{ $service->price }}<br><br>
                                </div>

                                <!-- Add to Invoice Button -->
                                <form action="{{ route('services.addToInvoice', $service->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" title="Add to Invoice">
                                        Add to Invoice
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @else
                <p class="text-center" style="font-weight: bold">No Add-on Available</p>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .larger-image-container {
        width: 100%;
        height: 300px;
        /* Adjust the height as needed */
        overflow: hidden;
    }

    .larger-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection