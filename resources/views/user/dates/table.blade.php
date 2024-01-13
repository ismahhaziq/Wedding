@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Choose Date'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Choose Date</h6>
                    </div>
                </div>

<div id="alert">
                    @include('components.alert')
                </div>

                @if(auth()->user()->dates->count() > 0)
                    <ul>
                        @foreach(auth()->user()->dates as $userDate)
                            <li>
                                <form method="post" action="{{ route('dates.update', $userDate->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Chosen Date:</label>
                                        <input type="text" class="form-control col-sm-3 datepicker" id="datepicker" name="date" min="{{ now()->format('Y-m-d') }}" value="{{ \Carbon\Carbon::parse($userDate->date)->format('Y-m-d') }}" required @if($userDate->date === now()->format('Y-m-d')) disabled @endif>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning">Update Date</button>

                                    <button type="submit" form="deleteForm_{{ $userDate->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this date?')">Delete Date</button>
                                </form>

                                <form method="post" action="{{ route('dates.destroy', $userDate->id) }}" id="deleteForm_{{ $userDate->id }}" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if(auth()->user()->dates->count() == 0)
                    <form method="post" action="{{ route('dates.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="date" class="form-label">Select Date:</label>
                            <input type="text" class="form-control datepicker" id="datepicker" name="date" min="{{ now()->format('Y-m-d') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Choose Date</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Add these lines to your HTML file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>


<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var disabledDates = {!! json_encode($disabledDates) !!};
        var today = moment().format('YYYY-MM-DD');

        var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            format: 'YYYY-MM-DD',
            disableDayFn: function (date) {
                return disabledDates.indexOf(moment(date).format('YYYY-MM-DD')) !== -1;
            },
            minDate: new Date(today),
        });
    });

</script>
    
@endsection
