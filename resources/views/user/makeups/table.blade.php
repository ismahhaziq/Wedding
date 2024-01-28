@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Makeup Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>List of Makeups</h6>
                    </div>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    @if(count($makeups) > 0)
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            @foreach ($makeups as $makeup)
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Makeup Image -->
                                            @if ($makeup->title == "Dresses Only")
                                                <!-- Centered Carousel Card -->
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div id="makeupCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('./img/dress1.jpg') }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 1">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('./img/dress2.png') }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 2">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('./img/dress3.png') }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 2">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('./img/dress4.png') }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 2">
                                                            </div>                                                                                                                        
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#makeupCarousel" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#makeupCarousel" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @else
                                             <div class="larger-image-container">
                                                <img src="{{ asset('storage/' . $makeup->image) }}"  class="avatar me-3" alt="Current Image">
                                            </div>
                                            @endif
                                            <!-- Makeup Title -->
                                            <h5 class="text-black-bold p-2">{{ $makeup->title }}</h5>

                                            <div class="card-text">
                                                <!-- Makeup Price -->
                                                <strong>Price:</strong> RM{{ $makeup->price }}<br><br>
                                                
                                                <!-- Makeup Description -->
                                                {!! nl2br(e($makeup->description)) ?? 'N/A' !!}
                                            </div>

                                            <!-- Add to Invoice Button -->
                                            <form action="{{ route('makeups.addToInvoice', $makeup->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" title="Add to Invoice">
                                                    Add to Invoice
                                                </button>
                                            </form>
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

        .carousel-inner {
            width: 300px;
            height: 300px;
        }
    </style>
@endsection
