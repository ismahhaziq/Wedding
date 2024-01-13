@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Guest'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Guest</h2>
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
                    <form action="{{ route('guests.update', $guest->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Guest Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $guest->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Guest Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $guest->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="relatives" class="form-label">Number of Relatives</label>
                            <input type="number" class="form-control" id="relatives" name="relatives" value="{{ old('relatives', $guest->relatives) }}" required>
                        </div>

                        <!-- Add form fields for other properties -->

                        <button type="submit" class="btn btn-primary">Update Guest</button>
                        <a class="btn btn-secondary" href="{{ route('guests.index') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
