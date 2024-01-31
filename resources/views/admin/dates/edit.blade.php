@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Date Status'])

<div class="row mt-4 mx-4">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Edit Date Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dates.updateStatus', $date->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Pending" {{ $date->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Confirmed" {{ $date->status == 'Confirmed' ? 'selected' : '' }}>Confirmed
                            </option>
                            <option value="Rejected" {{ $date->status == 'Rejected' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <a class="btn btn-primary" href="{{ route('dates.index') }}"> Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection