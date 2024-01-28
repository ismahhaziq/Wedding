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
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div id="alert">
                    @include('components.alert')
                </div>
                                <div class="card-body">
                                    <form role="form" method="post" action="{{ route('login') }}">
                                        @csrf <!-- Add CSRF token for Laravel -->
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Email"
                                                aria-label="Email">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password"
                                                aria-label="Password">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://th.bing.com/th/id/R.40ba57fd1d7c181580d692acc001cd7f?rik=hVcZQX5DZEWefg&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fKpD2oo0.jpg&ehk=HwS8tmQ4NRxwvG2gPF9kG9x1nn%2fTZrke0hjfNejJ7%2bs%3d&risl=&pid=ImgRaw&r=0');
              background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Timeless Beauty, Modern Elegance"</h4>
                                <p class="text-white position-relative">The more enchanting the celebration appears, the more meticulous the planning behind the scenes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
