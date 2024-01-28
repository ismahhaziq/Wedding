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
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Elegance Redefined, Love Expressed"</h4>
                                <p class="text-white position-relative">In our exquisite gowns, elegance is not just a style, but a heartfelt expression of love.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
