@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Checklist'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create Checklist</h2>
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

                    <form action="{{ route('checklists.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="content_type" class="form-label">Content Type:</label>
                            <div class="form-check">
                                <input type="radio" name="content_type" id="list" class="form-check-input" value="list" checked>
                                <label class="form-check-label" for="list">List</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" id="content" class="form-control"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{ route('checklists.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
