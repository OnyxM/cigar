@extends('layouts.app')

@section("header")
    <div style="padding-top:6rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-white text-center">Store</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="py-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="./assets/img/cigars-image-1024x744.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="fw-bold text-gold-1">Light agata cigar</h5>
                            <p class="fw-bold">$25</p>
                            <a href="product_details.html" class="btn-cigar text-decoration-none">Buy now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="./assets/img/cigars-image-1024x744.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="fw-bold text-gold-1">Light agata cigar</h5>
                            <p class="fw-bold">$25</p>
                            <a href="product_details.html" class="btn-cigar text-decoration-none">Buy now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="./assets/img/cigars-image-1024x744.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="fw-bold text-gold-1">Light agata cigar</h5>
                            <p class="fw-bold">$25</p>
                            <a href="product_details.html" class="btn-cigar text-decoration-none">Buy now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="./assets/img/cigars-image-1024x744.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="fw-bold text-gold-1">Light agata cigar</h5>
                            <p class="fw-bold">$25</p>
                            <a href="product_details.html" class="btn-cigar text-decoration-none">Buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="pt-3 bg-primary-cigar text-white" style="padding-bottom:10rem;" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-gold pt-5">WHY OUR CIGARS</p>
                    <h1 class="text-white">
                        Good cigars starts with good tobacco
                    </h1>
                </div>

                <div class="col-md-6">
                    <p class="pt-5 text-white">
                        The products offered in our store will be appreciated by true connoisseurs of quality tobacco. In the production of our brands, we use world famous varieties of tobacco. Staying true to classic traditions, we are constantly improving our products and working on creating new combinations with unique characteristics and unusual taste sensations.
                    </p>
                    <button class="btn btn-link text-decoration-none" style="color:#d3b668;">LEARN MORE &nbsp <i class="fas fa-arrow-right"></i></button>
                </div>

            </div>
        </div>
    </section>
@endsection
