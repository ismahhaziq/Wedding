@extends('layouts.apps')

@section('content')

<head>
    <link href="{{ asset('argon/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('argon/assets/css/argon-dashboard.css') }}" rel="stylesheet" />

    <link href="{{ asset('argon/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <script src="{{ asset('argon/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('argon/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('argon/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/assets/js/argon-dashboard.js') }}"></script>

</head>
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('welcome') }}">
                        Modernize Enterprise
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                    href="{{ route('welcome') }}">
                                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('register') }}">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Sign Up
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('login') }}">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Sign In
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h1 class="font-weight-bolder">Welcome to Modernize Enterprise</h1>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url('https://c0.wallpaperflare.com/preview/492/1020/834/weddings-bride-groom-marriage.jpg');
              background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Elegance Redefined, Love
                                Expressed"</h4>
                            <p class="text-white position-relative">In our exquisite gowns, elegance is not just a
                                style, but a heartfelt expression of love.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New section for About Us -->
    <section>
        <div class="container mt-5">
            <div class="row align-items-start">
                <div class="col-md-12 mb-4">
                    <h2 class="text-left mb-4"><span style="color: #F9623C; font-size:150%">A</span>bout Us</h2>
                    <div class="row align-items-start">
                        <div class="col-md-6 mb-4">
                            <p style="font-size: 20px;">At Modernize Enterprise, we are dedicated to making every
                                wedding journey a seamless and unforgettable experience for brides-to-be. With our
                                passion for excellence and commitment to personalized service, we strive to transform
                                dreams into reality, ensuring that each bride feels radiant, confident, and cherished on
                                her special day.</p>
                        </div>
                        <div class="col-md-6 mb-4 align-self-start">
                            <img src="{{ asset('./img/poster.jpg') }}" alt="About Us Image" class="img-fluid"
                                style="max-width: 90%; margin-top: -60px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- New section for displaying services -->
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-4"><span style="color: #F9623C; font-size:150%">S</span>ervices</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="service-item text-center border p-3"
                        style="background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);">
                        <img src="{{ asset('./img/makeupndress.jpg') }}" alt="Service 1" class="img-fluid"
                            style="max-width: 100%; max-height: 110%;">
                        <h4 class="mt-3">Make Up & Dress</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="service-item text-center border p-3"
                        style="background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);">
                        <img src="{{ asset('./img/catering.jpg') }}" alt="Service 2" class="img-fluid"
                            style="max-height: 10000px;">
                        <h4 class="mt-3">Catering</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="service-item text-center border p-3"
                        style="background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);">
                        <img src="{{ asset('./img/dj.jpg') }}" alt="Service 3" class="img-fluid"
                            style="max-height: 10000px;">
                        <h4 class="mt-3">DJ</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="service-item text-center border p-3"
                        style="background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);">
                        <img src="{{ asset('./img/photographer.jpg') }}" alt="Service 4" class="img-fluid"
                            style="max-height: 100%;">
                        <h4 class="mt-3">Photograph</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New section for displaying catering packages -->
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-4"><span style="color: #F9623C; font-size:150%">C</span>atering Packages
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach($caterings as $catering)
                    <div class="col-md-4 mb-4">
                        <div class="service-item text-center border p-3"
                            style="background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);">
                            <h4 class="mt-3">{{ $catering->title }}</h4>
                            <h5>Price: RM{{ $catering->price }} / pax</h5>
                            <p>{!! nl2br(e($catering->description)) ?? 'N/A'!!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- New section for Contact Us -->
    <section>
        <div class="container mt-5">
            <div class="row align-items-start">
                <div class="col-md-12 mb-4">
                    <h2 class="text-center mb-4"><span style="color: #F9623C; font-size:150%">C</span>ontact Us</h2>
                    <div class="row align-items-start">
                        <div class="mb-4">
                            <p class="text-center" style="font-size: 20px;">You can also email us: <a
                                    href="mailto:modernize54@gmail.com" class="text-bold">modernize54@gmail.com</a> or
                                call us at <a href="tel:+01172514020" class="text-bold">011-72514020</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection