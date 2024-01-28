@extends('layouts.apps')

@section('content')
    @include('layouts.navbars.guest.navbar')
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://wallpaperaccess.com/full/229799.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register</h5>
                        </div>
                        <div class="row px-xl-5 px-sm-4 px-3">
                            <div class="col-12">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="inputbox">
                                        <label for="name">Name</label>
                                        <ion-icon name="person"></ion-icon>
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>

                                    <div class="inputbox">
                                        <label for="email">Email Address</label>
                                        <ion-icon name="email"></ion-icon>
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>

                                    <div class="inputbox">
                                         <label for="phone_number">Phone Number</label>
                                        <ion-icon name="call"></ion-icon>
                                        <input id="phone_number" type="tel" class="form-control" name="phone_number" placeholder="Phone Number" aria-label="Phone Number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                        @error('phone_number') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>

                                    <div class="inputbox">
                                        <label for="password">Password</label>
                                         <ion-icon name="lock"></ion-icon>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" required autocomplete="new-password">
                                        @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>

                                    <div class="inputbox">
                                        <label for="password-confirm">Confirm Password</label>
                                        <ion-icon name="lock"></ion-icon>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" aria-label="Confirm Password" required autocomplete="new-password">
                                    </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection
