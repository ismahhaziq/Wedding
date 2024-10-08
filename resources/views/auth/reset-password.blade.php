@extends('layouts.app')

@section('content')
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            @include('layouts.navbars.guest.navbar')
        </div>
    </div>
</div>
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Reset your password</h4>
                                <p class="mb-0">Enter your new password</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="flex flex-col mb-3">
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            placeholder="Email" value="{{ $email ?? old('email') }}" aria-label="Email"
                                            required>
                                        @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            placeholder="New Password" aria-label="Password" required>
                                        @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-lg" placeholder="Confirm Password"
                                            aria-label="Confirm Password" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Reset
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                            <div id="alert">
                                @include('components.alert')
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url('https://th.bing.com/th/id/R.40ba57fd1d7c181580d692acc001cd7f?rik=hVcZQX5DZEWefg&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fKpD2oo0.jpg&ehk=HwS8tmQ4NRxwvG2gPF9kG9x1nn%2fTZrke0hjfNejJ7%2bs%3d&risl=&pid=ImgRaw&r=0');
                                        background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Timeless Beauty, Modern
                                Elegance"</h4>
                            <p class="text-white position-relative">The more enchanting the celebration appears, the more meticulous the planning behind the scenes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection