@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Manage Chosen Dates'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Manage Chosen Dates</h6>
                    </div>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>

                @if(auth()->user()->chosenDates->count() > 0)
                    <ul>
                        @foreach(auth()->user()->chosenDates as $chosenDate)
                            <li>
                                <form method="post" action="{{ route('chosenDates.update', $chosenDate->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="chosenDate" class="form-label">Chosen Date:</label>
                                        <input type="date" class="form-control col-sm-3" id="chosenDate" name="chosenDate" min="{{ now()->format('Y-m-d') }}" value="{{ $chosenDate->date }}" required @if($chosenDate->date === now()->format('Y-m-d')) disabled @endif>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning">Update Chosen Date</button>

                                    <button type="submit" form="deleteChosenDateForm_{{ $chosenDate->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this chosen date?')">Delete Chosen Date</button>
                                </form>

                                <form method="post" action="{{ route('chosenDates.destroy', $chosenDate->id) }}" id="deleteChosenDateForm_{{ $chosenDate->id }}" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <form method="post" action="{{ route('chosenDates.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="chosenDate" class="form-label">Select Chosen Date:</label>
                        <input type="date" class="form-control" id="chosenDate" name="chosenDate" min="{{ now()->format('Y-m-d') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Choose Date</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let chosenDateInput = document.getElementById('chosenDate');
            let userChosenDates = @json(auth()->user()->chosenDates->pluck('date'));

            chosenDateInput.addEventListener('input', function () {
                if (userChosenDates.includes(this.value)) {
                    alert('This chosen date is already taken.');
                    this.value = ''; // Reset the value if the date is already chosen
                }
            });
        });
    </script>
@endsection
