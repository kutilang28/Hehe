<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
    <link rel="stylesheet" href="{{asset('Templates')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('Templates')}}/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('Templates')}}/css/templatemo-style.css">
<!--

TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film mr-2"></i>
                Library
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="{{route('kembali.index')}}">Pengembalian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="{{route('koleksi.index')}}">Koleksi</a>
                    </li>
                    @guest <!-- Check if the user is a guest (not logged in) -->
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register')) <!-- Check if registration is enabled -->
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @else <!-- If the user is authenticated -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <i class="fas fa-user"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>



    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{asset('Templates')}}/img/liba.jpg">
    </div>


    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Library
            </h2>
        </div>
        <div class="col-6">
            <select id="categoryFilter" class="form-control">
                <option value="all">All Categories</option>
                @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                {{-- <option value="fiksi">Fiksi</option> --}}
                @endforeach
                <!-- Add more options for each category -->
            </select>
        </div><br>
        <div class="row tm-mb-90 tm-gallery">
            @foreach ($data as $item)
        	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5" data-category="{{ $item->kategori_id }}">
                <figure class="effect-ming tm-video-item">
                    <img src="{{asset('img/'.$item->foto)}}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{ $item->judul }} <br> @if($item->status == 1)
                            (Available)
                        @else
                            (Not Available)
                        @endif</h2>
                        <a href="{{ route('pinjam.show', $item->id) }}">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">{{ $item->tahun_terbit }}</span>
                    <span>{{ $item->penulis }}</span>

                    <span >@php
                        $kategori = \App\Models\Kategori::find($item->kategori_id);
                    @endphp
                    {{ $kategori ? $kategori->nama_kategori : 'No Category' }}</span>
                </div>
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Catalog-Z is free <a rel="sponsored" href="https://v5.getbootstrap.com/">Bootstrap 5</a> Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('Templates')}}/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
    <script>
        $(document).ready(function() {
            // Event listener for category filter change
            $('#categoryFilter').change(function() {
                var selectedCategory = $(this).val();

                // Show all items if "All Categories" is selected
                if (selectedCategory === 'all') {
                    $('.tm-gallery .col-xl-3').show();
                } else {
                    // Hide all items and show only items with the selected category
                    $('.tm-gallery .col-xl-3').hide();
                    $('.tm-gallery .col-xl-3[data-category="' + selectedCategory + '"]').show();
                }
            });
        });
    </script>

</body>
</html>
