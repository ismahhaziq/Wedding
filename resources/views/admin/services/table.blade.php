@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Service Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('services.create') }}" class="btn btn-primary">Create Service</a>
            </div>

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Services</h6>
                        <div class="mb-2">
                            <a href="{{ route('services.create') }}" class="btn btn-primary">Create Service</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(count($services) > 0)
                        <div class="table-responsive p-0 overflow-auto">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $service->title }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">RM{{ $service->price }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <span class="badge {{ $service->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $service->status == 1 ? 'Available' : 'Unavailable' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                                <form id="deleteForm{{ $service->id }}" action="{{ route('services.destroy', $service->id) }}" method="POST" class="mx-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No services added</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(serviceId) {
            if (confirm('Are you sure you want to delete this service?')) {
                document.getElementById('deleteForm' + serviceId).submit();
            }
        }
    </script>
@endsection