@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Catering'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create Catering</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('caterings.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (RM):</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{ route('caterings.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
