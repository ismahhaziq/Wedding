@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Makeup Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>List of Makeups</h6>
                        <div class="mb-2">
                            <!-- Add New Makeup Button -->
                            <a href="{{ route('makeups.create') }}" class="btn btn-primary">Add New Makeup</a>
                        </div>
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
                                             <div class="larger-image-container">
                                                <img src="{{ asset('storage/' . $makeup->image) }}"  class="avatar me-3" alt="Current Image">
                                            </div>

                                            <!-- Makeup Title -->
                                            <h5 class="text-black-bold p-2">{{ $makeup->title }}</h5>

                                            <div class="card-text">
                                                <!-- Makeup Price -->
                                                <strong>Price:</strong> RM{{ $makeup->price }}<br><br>
                                                
                                                <!-- Makeup Description -->
                                                {!! nl2br(e($makeup->description)) ?? 'N/A' !!}
                                            </div>

                                            <div class="text-left mt-2">
                                                <!-- Edit and Delete Buttons -->
                                                <form action="{{ route('makeups.destroy', $makeup->id) }}" method="POST" class="d-inline">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('makeups.edit', $makeup->id) }}" title="Edit">
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

    

    </style>
@endsection
