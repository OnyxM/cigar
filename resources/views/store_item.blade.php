@extends('layouts.app')

@section("header")
    <div style="padding-top:6rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-white text-center">Product Details</h1>
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
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselId0" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                            @foreach($product->photos as $p)
                            <li data-bs-target="#carouselId{{$p->id}}" data-bs-slide-to="1" aria-label="slide {{$p->id}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="{{ $product->image }}" class="w-100 d-block" alt="First slide">
                            </div>
                            @foreach($product->photos as $photo)
                            <div class="carousel-item">
                                <img src="{{ $photo->link }}" class="w-100 d-block" alt="slide {{$p->id}}">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="text-gold-1 fw-bold">{{ $product->name }}</h4>
                    <p class="lead fw-bold">${{ $product->price }}</p>
                    <hr>
                    <p>{!! $product->description !!}</p>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>

    </section>

    @if($other_products->count() > 0)
    <section class="py-3 mb-5">
        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-center">Other products</h1>
                </div>
            </div>
            <div class="row">
                @foreach($other_products as $o_p)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="{{ $o_p->image }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="fw-bold text-gold-1">{{ $o_p->name }}</h5>
                            <p class="fw-bold">${{ $o_p->price }}</p>
                            <a href="{{ route('store.item', ['id' => $o_p->id, 'slug' => $o_p->slug]) }}" class="btn-cigar text-decoration-none">Buy now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
    @endif

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

@section("js")
    <script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            style: {
                layout: 'horizontal'
            },
            // Call your server to set up the transaction
            createOrder: function(data, actions) {
                return fetch("{{route('paypal.create_order')}}", {
                    method: 'POST',
                    body:JSON.stringify({
                        'product_id': "{{$product->id}}",
                        'user_id' : "1",
                        'amount' : {{$product->price}},
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },
            
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    
                    $.ajax({
                        url: "{{route('paypal.capture_order')}}",
                        type: "POST",
                        data: orderData,
                        dataType: "json",
                        success: function(response) {
                            $("#paypal-button-container").html(response.message);
                            $("#paypal-button-container").addClass("text-center text-bg-success");
                        }
                    });
                });
            }

        }).render('#paypal-button-container');
    </script>
@endsection
