@extends('layouts.userapp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

<div class="container-fluid py-4"
    style="position: relative; background-image: url('https://c1.wallpaperflare.com/preview/635/807/822/picture-frame-canvas-card.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;"></div>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8 mb-xl-0 mb-4">
            <div class="card text-center border-romantic-pink" style="color: #5BA8FA;">
                <!-- Added a border with a romantic pink color -->
                <div class="card-body">
                    <h2 class="card-title text-romantic-red">Embark on Your Magical Journey</h2>
                    <!-- Changed the title and font color -->
                    <p class="card-text text-romantic-gray">Create enchanting memories for the most special day of your
                        life.</p>

                    <!-- Imaginative Icon -->
                    <div class="mb-4">
                        <i class="fas fa-heart fa-5x text-romantic-pink" style="color: #ff66b2;"></i>
                        <!-- Changed the icon color to romantic pink -->
                    </div>

                    <!-- Creative Button with Animation -->
                    <a href="{{ route('dates.index') }}" class="btn btn-animate btn-romantic-pink btn-lg">
                        <span>Choose Your Event Date</span> <!-- Added animation to the button text -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection