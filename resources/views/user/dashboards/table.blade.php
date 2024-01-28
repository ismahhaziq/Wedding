@extends('layouts.userapp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">PROCEED TO RESERVATION</h5>
                        <!-- Your card content goes here -->

                        <!-- Big Button with Link -->
                        <a href="{{ route('dates.index') }}" class="btn btn-primary btn-lg">Choose Date</a>
                    </div>
                </div>
                
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
