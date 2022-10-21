@extends('layouts.app')

@section("header")
    <div style="padding-top:15rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-white display-1 text-center">The Best Cigars in the city</h1>
                    <p class="text-center"><a href="{{ route('store') }}" class="btn-header btn-lg">View products</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="py-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-gold">60 YEARS OF QUALITY</p>
                    <h1 class="mb-5">How the cigars are made</h1>
                    <p class="">
                        The products offered in our store will be appreciated by true connoisseurs of quality tobacco. In the production of our brands, we use world famous varieties of tobacco. Staying true to classic traditions, we are constantly improving our products and working on creating new combinations with unique characteristics and unusual taste sensations.
                    </p>
                    <button class="btn-cigar mb-3">Learn more</button>
                </div>

                <div class="col-md-6">
                    <img src="{{ asset('assets/img/photo-1547652577-b4fe2f34d7ee.png') }}" class="img-fluid">
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
