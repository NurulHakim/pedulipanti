<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detailpanti</title>

    <!-- Bootstrap core CSS -->

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/galeri.css')}}">
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .column {
            float: left;
            width: 50%;
            padding: 10px;

            /* Should be removed. Only for demonstration */
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        .rows:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>


</head>

<body>

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="position: relative">
            <a class="navbar-brand" href="/" style="margin-left: 1em;"><b style="color: white">pedulipanti</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse " id="navbarSupportedContent" style="margin-right: 2em">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item" style="margin-right: 1em">
                        <a class="nav-link" href="/listpanti">Cari Panti<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item" style="margin-right: 1em">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    @guest
                    <li class="nav-item" style="margin-right: 1em">
                        <a class="btn btn-outline-primary" href="{{route('login')}}" role="button" style="color: white; border-color: rgb(245, 121, 12)">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item" style="margin-right: 1em">
                        <a class="btn btn-primary" href="{{route('register')}}" role="button" style="background-color: rgb(245, 121, 12); border-color: rgb(245, 121, 12)">Sign Up</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>


    <!-- slider Area End-->
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding" style="padding-top: 1em">
        <div class="container">
            <div class="row">
                @foreach($panti as $panti)
                <div class="col-lg-12 posts-list">
                    <div class="single-post">
                        <h1 style="color: rgb(0, 178, 242)">{{$panti->nama_panti}}</h1>
                       
                        <div class=" feature-img" style="width: 100%; height: 50%">
                            <img class="img-fluid" src="{{asset('upload/panti/foto/'. $panti->foto_panti)}}" style="" alt="">
                        </div>
                        <div class="section-top-border" style="padding: 0; margin-top: 1em"></div>
                        <div class="navigation-top" style="padding-top: 0">
                            <div class="d-sm-flex justify-content-between text-center">
                                <div class="text-center my-2 my-sm-0">
                                   <a href="" style=""><button class="btn btn-sm btn-primary" style="background-color: orange">Hubungi</button></a>
                                </div>
                                <ul class="social-icons">
                                    <li>
                                        <p>as</p>
                                    </li>
                                    <li>
                                        <p>as</p>
                                    </li>
                                    <li>
                                        <p>as</p>
                                    </li>
                                    <li>
                                        <p>as</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="section-top-border"  style="padding-top: 0"></div>
                        <div class="blog_details">
                            <h3>Detail Panti</h3>
                            <div class="rows">
                                <div class="column" style="padding: 0em">
                                    <p>
                                        <h2 style="margin-bottom: 0">Deskripsi Panti</h2>
                                        {{$panti->deskripsi_panti}}
                                    </p>
                                    <p class="excert" style="font-size: 13pt">
                                        <h2 style="margin-bottom: 0">Alamat</h2>
                                        {{$panti->alamat_panti}}
                                    </p>
                                    <p>
                                        <h2 style="margin-bottom: 0">Nomor Telepon Panti</h2>
                                        {{$panti->no_telepon}}
                                    </p>
                                    <p>
                                        <h2 style="margin-bottom: 0">Nama Pemilik Panti</h2>
                                        {{$panti->nama_pemilik}}
                                    </p>
                                    <p>
                                        <h2 style="margin-bottom: 0">Nomor Telepon Pemilik Panti</h2>
                                        {{$panti->no_telepon_pemilik}}
                                    </p>
                                </div>
                                <div class="column" style="padding: 0em">
                                    <p>
                                        <h2 style="margin-bottom: 0">Deskripsi Panti</h2>
                                        {{$panti->deskripsi_panti}}
                                    </p>
                                    <p>
                                        <h2 style="margin-bottom: 0">Deskripsi Kebutuhan Panti</h2>
                                        {{$panti->deskripsi_kebutuhan}}
                                    </p>
                                    <p>
                                        <h2 style="margin-bottom: 0">Deskripsi Program Panti</h2>
                                        - Sekolah - Sholat berjamaah - Pengajian ashar - Pengajian ba'da magrib - Belajar bersama
                                    </p>
                                </div>
                            </div>

                            <div class="quote-wrapper">
                                <div class="quotes">
                                    "Jangan pernah lupa untuk selalu bersyukur. Dan berbagi adalah salah satu cara untuk bersyukur atas nikmatNya."
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Galeri Kegiatan Panti</h3>
                        <div class="row gallery-item">
                            @foreach($galeri as $galeri)
                            <div class="con-gallery">
                                <div class="box-pic">
                                    <div class="imgBox">
                                        <img src="{{asset('upload/panti/images/'. $galeri->path)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="btn-group" style="margin-bottom: 1em">
                            <a href="{{route('galeri_panti', $panti->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary" style="margin-top: 1em">Lihat Semua</button></a>
                        </div>
                    <div class="section-top-border">
                       
                    </div>
                    @endforeach




                </div>

            </div>
        </div>
    </section>
    <footer class="page-footer font-small blue" style="padding-top: 1em; padding-bottom: 1em">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright: v09042929
        </div>
        <!-- Copyright -->

    </footer>



    <script src="{{asset('js/modernizr-3.5.0.min.js')}}">
    </script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/poppers.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/animated.headline.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('js/contact.js')}}"></script>
    <script src="{{asset('js/jquery.form.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/mail-script.js')}}"></script>
    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>