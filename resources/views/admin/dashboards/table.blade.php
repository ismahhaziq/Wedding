@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('users.index') }}">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $totalUsers }}
                                    </h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('dates.index') }}">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Date Booked</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $totalDate }}
                                    </h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-calendar text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('makeups.index') }}">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Makeup</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $totalMakeup }}
                                    </h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fa fa-paint-brush text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('caterings.index') }}">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Catering</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $totalCatering }}
                                    </h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="fa fa-cutlery text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('services.index') }}">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Add-On</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $totalService }}
                                    </h5>
                                    <p class="mb-0">
                                        Available: {{ $totalAvailable }} <br> Unavailable: {{ $totalUnavailable }}
                                    </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fa fa-wrench text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

