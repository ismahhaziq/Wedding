@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Service'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Service</h6>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul style="font-weight: normal; color: #721c24;"> <!-- Adjust font-weight and color as needed -->
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body px-4 pt-4">
                    <form action="{{ route('services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $service->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $service->price) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>Unavailable</option>
                            </select>
                        </div>

                        <!-- Add other fields as needed -->

                        <button type="submit" class="btn btn-primary">Update Service</button>
                        <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
