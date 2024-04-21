<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Photo Detail Page</title>
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
            <a class="navbar-brand" href="{{url('')}}">
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
            <h2 class="col-12 tm-text-primary">Book Collection</h2>
        </div>
        <div class="col-12">
            <label for="kategoriSelect">Filter by Category:</label>
            <select id="kategoriSelect" class="form-control">
                <option value="all">All</option>
                <option value="fiksi">Fiksi</option>
                <option value="romance">Romance</option>
                <!-- Add more options for each category -->
            </select>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Loop through each book in the collection --}}
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->judul }}</td>
                                    <td>
                                        <img src="{{asset('img/'.$book->foto)}}" width="100px" alt="{{ $book->judul }}">
                                    </td>
                                    <td>{{ $book->penulis }}</td>
                                    <td>{{ $book->penerbit }}</td>
                                    <td>{{ $book->tahun_terbit }}</td>
                                    <td>{{ $book->kategori }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Integer ipsum odio, pharetra ac massa ac, pretium facilisis nibh. Donec lobortis consectetur molestie. Nullam nec diam dolor. Fusce quis viverra nunc, sit amet varius sapien.</p>
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
        document.addEventListener("DOMContentLoaded", function() {
            const kategoriSelect = document.getElementById('kategoriSelect');
            const rows = document.querySelectorAll('.table tbody tr');
    
            kategoriSelect.addEventListener('change', function() {
                const selectedCategory = this.value;
    
                rows.forEach(function(row) {
                    const categoryCell = row.querySelector('td:last-child');
                    const category = categoryCell.textContent.trim();
    
                    if (selectedCategory === 'all' || category === selectedCategory) {
                        row.style.display = 'table-row'; // Show the row if it matches the selected category or if 'All' is selected
                    } else {
                        row.style.display = 'none'; // Hide the row if it doesn't match the selected category
                    }
                });
            });
        });
    </script>
    
    
</body>
</html>
