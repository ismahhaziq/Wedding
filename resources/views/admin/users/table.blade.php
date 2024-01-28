@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
            </div>

            <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h6>Users</h6>
                    <div class="mb-2">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
                    </div>
                </div>
            </div>
                            <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 overflow-auto">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Create Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                             @php
                                 $count = 1;
                             @endphp
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div>
                                                        @if($user->image)
                                                            <img src="{{ asset('storage/' . $user->image) }}"  class="avatar me-3" alt="Current Image">
                                                        @else
                                                            <img src="{{ asset('storage/images/users/default_user_image.jpg') }}" class="avatar me-3" alt="Default Image">
                                                        @endif
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->phone_number }}</h6>
                                                    </div>
                                                </div>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->user_type }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->created_at->format('d/m/Y') }}</p>
                                        </td>

                                        <td class="align-middle text-end">
                                            <form id="deleteForm{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm ms-auto">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto">Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            document.getElementById('deleteForm' + userId).submit();
        }
    }
</script>
@endsection
