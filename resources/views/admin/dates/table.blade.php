@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Date Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Dates</h6>
                    </div>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if($disabledDates && count($disabledDates) > 0)
                        <div class="table-responsive p-0 overflow-auto">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chosen Date</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabledDates as $date)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ \Carbon\Carbon::parse($date->date)->format('Y-m-d') }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a href="{{ route('admin.dates.edit', $date->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                                    <form id="deleteForm{{ $date->id }}" action="{{ route('admin.dates.destroy', $date->id) }}" method="POST" class="mx-1">
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
                        <p class="text-center">No dates added</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(dateId) {
            if (confirm('Are you sure you want to delete this date?')) {
                document.getElementById('deleteForm' + dateId).submit();
            }
        }
    </script>
@endsection
