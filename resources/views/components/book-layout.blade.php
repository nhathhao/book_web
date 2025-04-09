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
            .navbar {
                background-color: #000000;
                font-weight: bold;
            }

            .nav-item a {
                color: #fff !important;
            }

            .navbar-nav {
                margin: 0 auto;
            }

            .list-book {
                display: grid;
                grid-template-columns: repeat(4, 24%);
                gap: 20px;
            }

            .book {
                margin: 10px;
                text-align: center;
            }

            footer {
                background-color: #f8f9fa;
                padding: 20px;
                text-align: center;
            }

            #bannerCarousel .carousel-inner img {
                width: 100%;
                height: 400px; /* Set a fixed height for consistency */
                object-fit: cover; /* Ensures the image covers the area while maintaining aspect ratio */
            }

            .cart-icon {
                color: black;
                cursor: pointer;
            }

            .cart-number {
                width: 20px;
                height: 20px;
                background-color: #23b85c;
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
        </style>
    </head>
    <body>
        <!-- Header -->
        <header class="bg-light py-3">
            <div class="container d-flex justify-content-between align-items-center">
                <h1 class="h4">
                    <a href="{{ url('sach') }}" class="text-dark text-decoration-none">BOOKSphere</a>
                </h1>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search books..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner_sach1.jpg') }}" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner_sach2.jpg') }}" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/sidebar_2.jpg') }}" class="d-block w-100" alt="Banner 3">
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
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ url('sach/theloai/1') }}">Tiểu thuyết</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ url('sach/theloai/2') }}">Truyện ngắn - tản văn</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ url('sach/theloai/3') }}">Tác phẩm kinh điển</a>
                    </li>
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