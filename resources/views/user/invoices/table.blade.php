@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Guest Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Guests</h6>
                        <div class="mb-2">
                            <a href="{{ route('guests.create') }}" class="btn btn-primary">Create Guest</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 overflow-auto">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of Relatives</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($guests as $guest)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $guest->name }}
                                        </td>
                                        <td>
                                            {{ $guest->email }}
                                        </td>
                                        <td class="text-center">
                                            {{ $guest->relatives }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                                <form action="{{ route('guests.destroy', $guest->id) }}" method="post" class="mx-1">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this guest?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No guests found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
