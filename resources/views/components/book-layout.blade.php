<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #ffffff;
                color: #000000;
                margin: 0;
                padding: 0;
            }

            .navbar {
                background-color: #000000;
                font-weight: bold;
                border-bottom: 1px solid #ffffff;
            }

            .nav-item a {
                color: #ffffff !important;
                text-transform: uppercase;
                font-size: 18px;
                font-weight: bolder;
            }

            .navbar-nav {
                margin: 0 auto;
            }

            .list-book {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
            }

            .book {
                margin: 10px;
                text-align: center;
                border: 1px solid #000000;
                padding: 10px;
                background-color: #ffffff;
            }

            footer {
                background-color: #000000;
                color: #ffffff;
                padding: 20px;
                text-align: center;
                font-size: 12px;
            }

            #bannerCarousel {
                background-color: #ffffff; /* Set background to white */
            }

            #bannerCarousel .carousel-inner img {
                width: 1512px;
                height: 400px;
                object-fit: cover;
            }

            .cart-icon {
                color: #000000;
                cursor: pointer;
            }

            .cart-number {
                width: 20px;
                height: 20px;
                background-color: #000000;
                color: #ffffff;
                font-size: 12px;
                border: none;
                border-radius: 50%;
                position: absolute;
                right: -10px;
                top: -5px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .auth-buttons {
                gap: 20px;
            }

            .btn {
                background-color: #000000;
                color: #ffffff;
                border: 1px solid #ffffff;
                text-transform: uppercase;
                font-size: 12px;
            }

            .btn:hover {
                background-color: #ffffff;
                color: #000000;
            }

            #bannerCarousel .carousel-indicators {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 6px;
                position: absolute;
                bottom: 10px; /* Move upward to create space from the bottom */
                left: 50%; /* Center horizontally */
                transform: translateX(-50%); /* Ensure proper centering */
                list-style: none;
                background-color: rgba(223, 204, 204, 0.5);
                padding: 4px 6px;
                border-radius: 15px;
                width: fit-content; /* Dynamically adjust width */
                z-index: 10; /* Ensure it stays above the carousel content */
                margin: 0; /* Remove any default margins */
            }

            #bannerCarousel .carousel-indicators li {
                width: 8px;
                height: 8px;
                background-color: #6c757d;
                border-radius: 50%;
                cursor: pointer;
                transition: background-color 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            #bannerCarousel .carousel-indicators li::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.5);
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 5s linear; /* Adjust duration to match carousel interval */
            }

            #bannerCarousel .carousel-indicators .active::after {
                transform: scaleX(1);
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <header class="bg-light py-3">
            <div class="container d-flex justify-content-between align-items-center">
                <h1 class="h4">
                    <a href="{{ url('/') }}" class="text-dark text-decoration-none">BOOKSphere</a>
                </h1>
                <form method="post" action="{{url('/timkiem')}}" class="form-inline">
                    <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Sách bạn muốn tìm..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 search-btn" type="submit">Tìm kiếm</button>
                    {{csrf_field()}}
                </form>
                <div class='d-flex align-items-center justify-content-end auth-buttons' style='gap: 20px;'>
                    <div style='position:relative;' class='d-flex align-items-center'>
                        <div class="cart-number" id='cart-number-product'>
                            @if (session('cart'))
                                {{ count(session('cart')) }}
                            @else
                                0
                            @endif
                        </div>
                        <a href="{{route('order')}}" class="cart-icon">
                            <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class='d-flex align-items-center' style='margin-left: 20px;'>
                        @auth
                            <div class="dropdown">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('account')}}">Quản lý</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" onclick="event.preventDefault();
                                                    this.closest('form').submit();">Đăng xuất</a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}">
                                <button class='btn btn-sm btn-primary'>Đăng nhập</button>
                            </a>&nbsp;
                            <a href="{{ route('register') }}">
                                <button class='btn btn-sm btn-success'>Đăng ký</button>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <!-- Carousel -->
        <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators" style="width: fit-content; height: fit-content; border-radius: 8px; background-color: rgba(0, 0, 0, 0.4);">
                <li data-target="#bannerCarousel" data-slide-to="0" class=""></li>
                <li data-target="#bannerCarousel" data-slide-to="1" class=""></li>
                <li data-target="#bannerCarousel" data-slide-to="2" class="active"></li>
                <li data-target="#bannerCarousel" data-slide-to="3" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner_sach1.jpg') }}" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner_sach2.jpg') }}" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner_sach3.jpg') }}" class="d-block w-100" alt="Banner 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner_sach4.jpg') }}" class="d-block w-100" alt="Banner 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <ul class="navbar-nav mx-auto d-flex flex-row">
                    @foreach($theLoai as $data)
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="{{ url('theloai/' . $data->id) }}">{{ $data->ten_the_loai }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main style="width: 1000px; margin: 2px auto;">
            <div class="row">
                <div class="col-12">
                    {{$slot}}
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <p><strong>About Us:</strong> Book Web is your go-to platform for amazing books.</p>
                <p><strong>Contact:</strong> contact@bookweb.com</p>
                <p><strong>Address:</strong> 123 Book Street, Reading City</p>
            </div>
        </footer>
    </body>
</html>