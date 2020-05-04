<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PEDULI PANTI </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
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
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('img/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <!-- HEADER -->
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/" style="margin-left: 1em"><b style="color: white">pedulipanti</b></a>
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


                            <a class="dropdown-item" href="{{ route('deleteAccount', Auth::user()->id)}}">
                                Hapus Akun
                            </a>

                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <!-- HEADER --> -->
    <!-- @include('header.headerWebsite') -->
    <!-- END OF HEADER -->

    <main>
        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="{{asset('img/slidekesatu.png')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="hero__caption">
                                    <h1>Temukan Panti <span>Untuk Kamu Sumbangkan</span></h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- form -->
                                <form action="{{ route('searchPanti')}}" method="get" class="search-box">
                                    <div class="input-form mb-30">
                                        <input style="font-size: 12pt" name="query" type="text" placeholder="Masukkan Nama Panti atau Tag Kebutuhan Panti! Contoh : Makanan">
                                    </div>
                                    <div class="select-form mb-30">
                                        <div class="select-itms">
                                            <select name="lokasi" id="lokasi">
                                                <option value="">Semua Lokasi</option>
                                                <option value="1871021">BUMI WARAS</option>
                                                <option value="1871061">ENGGAL</option>
                                                <option value="1871041">KEDAMAIAN</option>
                                                <option value="1871080">KEDATON</option>
                                                <option value="1871071">KEMILING</option>
                                                <option value="1871083">LABUHAN RATU</option>
                                                <option value="1871072">LANGKAPURA</option>
                                                <option value="1871030">PANJANG</option>
                                                <option value="1871081">RAJABASA</option>
                                                <option value="1871091">SUKABUMI</option>
                                                <option value="1871090">SUKARAME</option>
                                                <option value="1871070">TANJUNG KARANG BARAT</option>
                                                <option value="1871060">TANJUNG KARANG PUSAT</option>
                                                <option value="1871040">TANJUNG KARANG TIMUR</option>
                                                <option value="1871082">TANJUNG SENANG</option>
                                                <option value="1871010">TELUK BETUNG BARAT</option>
                                                <option value="1871020">TELUK BETUNG SELATAN</option>
                                                <option value="1871050">TELUK BETUNG UTARA</option>
                                                <option value="1871011">TELUKBETUNG TIMUR</option>
                                                <option value="1871092">WAY HALIM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-form mb-30">
                                        <a href="" onclick="document.forms[0].submit();return false;"> Search</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->


        <div class="our-services servic-padding">
            <div class="container">
                <div class="row d-flex justify-contnet-center">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion" style="">
                                <span> <img src="https://img.icons8.com/material-rounded/40/000000/fast-browsing.png" /></span>
                            </div>
                            <div class="services-cap">
                                <h4>Cepat</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span><img src="https://img.icons8.com/carbon-copy/40/000000/easy.png" /></span>
                            </div>
                            <div class="services-cap">
                                <h4>Mudah</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span><img src="https://img.icons8.com/wired/40/000000/untested.png" /></span>
                            </div>
                            <div class="services-cap">
                                <h4>Banyak Pilihan</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Favourite Places Start -->
        <div class="favourite-place place-padding" style="padding-bottom: 1em">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">

                            <h2>CARI PANTI</h2>
                        </div>
                    </div>
                </div>
                <div class="album py-5 bg-light">
                    <div class="container">

                        <div class="row">
                            @foreach ($listpanti as $listpanti)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow" style="min-height: 380px; width: 380px;">
                                    <img class="card-img-top" src="{{ asset('upload/panti/foto/' . $listpanti->foto_panti) }}" alt="Card image cap" style="height: 200px; background-position: center center; background-repeat: no-repeat;">
                                    <div class="card-body">
                                        <h4 style="margin-bottom: 0em">{{ $listpanti->nama_panti }}</h4>
                                        <p class="card-text" style="color: orange"><img src="https://img.icons8.com/pastel-glyph/20/ffa200/worldwide-location--v2.png" /> {{$listpanti->kecamatan}}, {{$listpanti->kabupaten_kota}}</p>
                                        <p class="card-text">{{ substr($listpanti->deskripsi_panti,0, 100)}}</p>
                                        <p>
                                            <h5 style="margin-bottom: 0">Tag Kebutuhan Utama Panti</h5>
                                            <button class="btn btn-primary" style="border-radius: 50px; padding: 1.3em; margin-top: 1em" disabled>{{$listpanti->kebutuhan_panti}}</button>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <center>
                                                <div class="btn-group">
                                                    <a href="{{route('tampil_panti', $listpanti->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div style=" justify-content: center; display: flex;">
                            <a href="/listpanti"><button type="button" class="btn btn-sm btn-outline-secondary">Lihat Semua</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Favourite Places End -->
        <!-- Video Start Arera -->

        <!-- Video Start End -->
        <!-- Support Company Start-->

        <!-- Blog Area End -->

    </main>

    <!-- FOOTER -->
    @include('footer.footerWebsite')
    <!-- END OF FOOTER -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('js/modernizr-3.5.0.min.js')}}"></script>

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

</body>

</html>