@extends('layouts.userapp')

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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        @if ($service->status == 1)
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
                                                            <span class="badge bg-success">Available</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-end">
                                                    <div class="d-flex px-3 py-1 align-items-center">
                                                        <form method="POST" action="{{ route('invoices.add', $service->id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm mx-1">Add to Invoice</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No available services</p>
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
