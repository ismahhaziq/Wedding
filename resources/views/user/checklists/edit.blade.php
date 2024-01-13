@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Checklist'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Checklist</h2>
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

                    <form action="{{ route('checklists.update', $checklist->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $checklist->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="content_type" class="form-label">Content Type:</label>
                            <div class="form-check">
                                <input type="radio" name="content_type" id="list" class="form-check-input" value="list" {{ $checklist->content_type === 'list' ? 'checked' : '' }}>
                                <label class="form-check-label" for="list">List</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" id="content" class="form-control">{{ $checklist->content }}</textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-primary" href="{{ route('checklists.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
