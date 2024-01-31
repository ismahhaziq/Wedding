@extends('layouts.userapp')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dress Collection'])

<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>List of Dresses</h4>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    <div class="col mb-3">

                        <div class="card-body">
                            <div class="larger-image-container">
                                <!-- Sample Image URLs from Lorem Picsum -->
                                <img src="https://www.ppsignature.com/cdn/shop/products/BajuPengantin-Yellow-PPSignature-Butterfly_4_grande.jpg?v=1670999967"
                                    class="avatar" alt="Dress Image 1">
                                <img src="https://images.squarespace-cdn.com/content/v1/5ccb1148ca525b61f6fbe95f/1615543326041-6YQW31D1DSR1XJPYTJHU/image-asset.jpeg"
                                    class="avatar" alt="Dress Image 2">
                                <img src="https://blog.my-baju.net/wp-content/uploads/2017/03/Pengantin8.png"
                                    class="avatar" alt="Dress Image 3">
                            </div>
                            <div class="larger-image-container">
                                <img src="https://www.ppsignature.com/cdn/shop/products/BajuPengantin-White-PPSignature-Paulina_2_grande.jpg?v=1671000073"
                                    class="avatar" alt="Dress Image 4">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQixQX5RqbgVl4SaRBos7KPNWo_c4iN1FZKgQ&usqp=CAU"
                                    class="avatar" alt="Dress Image 5">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/60/Pengantin_Berbaju_Adat_Melayu_Deli.jpg"
                                    class="avatar" alt="Dress Image 6">
                            </div>
                            <div class="larger-image-container">
                                <img src="https://cdn0-production-images-kly.akamaized.net/x_pcFb04wSZnByY5P3-6Jhow5NI=/1x96:1000x659/469x260/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3553842/original/094031500_1630121273-shutterstock_2008744862.jpg"
                                    class="avatar" alt="Dress Image 7">
                                <img src="https://www.ppsignature.com/cdn/shop/products/BajuPengantin-Black-PPSignature-Blakey_2_grande.jpg?v=1671000058"
                                    class="avatar" alt="Dress Image 8">
                                <img src="https://www.ppsignature.com/cdn/shop/products/BajuPengantin-SongketDarkBrown-PuteriSejinjang-PPSignature_1_2048x2048.jpg?v=1677312498"
                                    class="avatar" alt="Dress Image 9">
                                <!-- Add more images as needed -->
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <!-- Button to go to another page -->
                    <a href="{{ route('makeups.index') }}" class="btn btn-primary" style="margin-left: 15px">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .larger-image-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
        width: 900px;
        height: 300px;
        /* Adjust the height as needed */
        overflow: hidden;
    }

    .larger-image-container img {
        width: 30%;
        /* Adjust the width as needed */
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection