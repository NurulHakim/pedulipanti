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
    <!-- HEADER -->
    @include('header.headerWebsite')
    <!-- END OF HEADER -->

    <!-- slider Area End-->
    <!--================Blog Area =================-->
    <main>
        <section class="blog_area single-post-area section-padding" style="padding-top: 5em">
            <div class="container">
                <div class="row">
                    @foreach($panti as $panti)
                    <div class="col-lg-12 posts-list">
                        <div class="single-post">
                            <h1 style="color: rgb(0, 178, 242);">{{$panti->nama_panti}}</h1>
                            <div class=" feature-img" style="width: 100%; height: 50%">
                                <img class="img-fluid" src="{{asset('upload/panti/foto/'. $panti->foto_panti)}}" style="" alt="">
                            </div>
                            <div class="section-top-border" style="padding: 0; margin-top: 1em"></div>
                            <div class="navigation-top" style="padding-top: 0">
                                <div class="d-sm-flex justify-content-between text-center">
                                    <div class="text-center my-2 my-sm-0">
                                        <a href="https://wa.me/{{$panti->no_telepon}}" ><button class="btn btn-sm btn-primary" style="border-radius: 50px;background-color: orange">Hubungi</button></a>
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
                            <div class="section-top-border" style="padding: 0"></div>
                            <div class="blog_details">
                                <h3>Detail Panti</h3>
                                <div class="rows">
                                    <p class="excert" style="font-size: 13pt">
                                        <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/material-sharp/24/000000/worldwide-location.png"/> Alamat</h2>
                                        {{$panti->alamat_panti}}
                                    </p>
                                    <p>
                                        <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/metro/24/000000/pin.png"/> Deskripsi Panti</h2>
                                        {{$panti->deskripsi_panti}}
                                    </p>

                                    <div class="column" style="padding: 0 4em 0 0">
                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/material-rounded/24/000000/demand.png"/> Deskripsi Kebutuhan Panti</h2>
                                            {{$panti->deskripsi_kebutuhan}}
                                        </p>

                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/android/24/000000/phone.png"/> Nomor Telepon Panti</h2>
                                            {{$panti->no_telepon}}
                                        </p>
                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/ios-filled/24/000000/name.png"/> Nama Pemilik Panti</h2>
                                            {{$panti->nama_pemilik}}
                                        </p>
                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/android/24/000000/phone.png"/> Nomor Telepon Pemilik Panti</h2>
                                            {{$panti->no_telepon_pemilik}}
                                        </p>
                                    </div>
                                    <div class="column" style="">

                                        <p>
                                            <h2 style="margin-bottom: 0">Tag Kebutuhan Utama Panti</h2>
                                            <button class="btn btn-primary" style="border-radius: 50px; padding: 1.3em; margin-top: 1em" disabled>{{$panti->kebutuhan_panti}}</button>
                                        </p>
                                        <p>
                                            <h2 style="margin-bottom: 0.5em">Jumlah Anak</h2>
                                            <p style="margin-bottom: 0; color: red"><img src="https://img.icons8.com/ios/20/000000/men-age-group-4.png"/> Laki - Laki : {{$panti->jumlah_anak_laki}}</p>
                                            <p><img src="https://img.icons8.com/ios/20/000000/standing-woman.png"/>Perempuan : {{$panti->jumlah_anak_perempuan}}</p>
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
                        <div class="album py-5 bg-light">
                            <h3>Galeri Kegiatan Panti</h3>
                            <div class="row gallery-item">
                                @foreach($galeri as $galeri)
                                <div class="con-gallery">
                                    <div class="box-pic">
                                        <div class="imgBox">
                                            <img src="{{asset('upload/panti/images/'. $galeri->path)}}" alt="">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <center>
                                    <div class="btn-group">
                                        <a href="{{route('galeri_panti', $panti->id)}}" class="left"><button type="button" class="btn btn-sm btn-outline-secondary" style="float: left">Lihat Semua</button></a>
                                    </div>
                                    @endforeach
                            </div>


                        </div>
                        <h3>Program Donasi Panti</h3>
                        <div class="row" style="margin-top: 1em">

                            @foreach ($program as $program)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow" style="min-height: 380px; width: 380px;">
                                    <img class="card-img-top" src="{{ asset('upload/panti/program/' . $program->photo_program) }}" alt="Card image cap" style="height: 200px; background-position: center center; background-repeat: no-repeat;">
                                    <div class="card-body">
                                        <h4 style="">{{ $program->judul }}</h4>
                                        <p class="card-text">{!! substr($program->deskripsi_program,0, 100)!!}</p>
                                        <p class="card-text" style="font-size: 13pt"> Membutuhkan Biaya Sebesar <b> Rp. {{$program->biaya}}</b></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href=""><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>





                    </div>
                </div>
            </div>
        </section>
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

</body>

</html>