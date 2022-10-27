<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}Cigar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}"  rel="stylesheet">
</head>
<body>

@if($title=="")
<div class="page-header mb-5" style="background-image:url('{{ asset('assets/img/cover.jpg') }}');">
@else
<div class="mb-5 bg-primary-cigar" style="height:25vh;">
@endif
    <!-- navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary-cigar py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/img/logo-smokio.png') }}" style="height:32px; width:auto;"> </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('index') }}" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link " href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('store') }}">Products</a>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item px-3">
                        <a class="btn-cigar-sm text-decoration-none" href="#contact" aria-current="page">Contact us</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>
    <!-- navigation -->

    <!-- header content -->
    @yield('header')
</div>

@yield('content')

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-2" style="bottom:63%;">
                    <div class="card-body px-5 border-0 shadow" style="border-color:transparent;">
                        <h3 class="text-center" style="color:#d3b668;">Years of experience</h3>
                        <p class="text-center text-sm">We offer a wide range of quality products, an easy shopping process and first-class service</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-2" style="bottom:63%;">
                    <div class="card-body px-5 text-sm shadow" style="border-color:transparent;">
                        <h3 class="text-center" style="color:#d3b668;">Years of experience</h3>
                        <p class="text-center text-sm">We offer a wide range of quality products, an easy shopping process and first-class service</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-2" style="bottom:63%;">
                    <div class="card-body px-5 text-sm shadow" style="border-color:transparent;">
                        <h3 class="text-center" style="color:#d3b668;">Years of experience</h3>
                        <p class="text-center text-sm">We offer a wide range of quality products, an easy shopping process and first-class service</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<section class="pt-3 text-white">
    <div class="container">
        <div class="row"></div>
    </div>
</section>

<footer id="contact">
    <div class="container">
        <div class="row text-sm">
            <div class="col-md-4">
                <h1 class="fw-bold">Smokoi</h1>
                <p class="text-sm">Reinventing the wy of creating websites, we aim to create the most master-piece theme available in the market</p>
                <h5>Social links</h5>
                <ul class="list-unstyled">
                    <li class="list-inline-item"><i class="fab fa-facebook"></i></li>
                    <li class="list-inline-item"><i class="fab fa-instagram"></i></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6>CONTACT US</h6>
                <p class="text-sm">202 Helga spring RD, Crawford, TN 38554</p>
                <p class="text-sm">Call us: 800.275.8777</p>
                <p class="text-sm">alex@company.com</p>
            </div>

            <div class="col-md-4">
                <h6>SIGN UP FOR EMAIL UPDATES</h6>
                <div class="input-group">
                    <input class="form-control form-control-lg">
                    <span class="input-group-text bg-primary-cigar text-white">Subscribe</span>
                </div>
            </div>

        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col">
                <p class="text-sm text-muted">copyright @ 2022</p>
            </div>
        </div>
    </div>

</footer>
<script src="{{ asset('assets/js/jquery.min.js') }}" ></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>
@yield('js')
</body>
</html>
