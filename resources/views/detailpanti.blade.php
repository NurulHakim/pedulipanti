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

    <style>
        .column {
            float: left;
            width: 50%;
            padding: 10px;

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

        /* .twitter-share-button {
            display: inline-block;
            width: 55px;
            height: 21px;
            background-color: blue;

        } */
    </style>


</head>

<body>
    <!-- HEADER -->
    @include('header.headerWebsite')
    <!-- END OF HEADER -->

    <!-- slider Area End-->
    <!--================Blog Area =================-->
    <main role="main">
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
                                        <a target="_blank" href="https://wa.me/62{{$panti->no_telepon}}"><button class="btn btn-sm btn-primary" style="border-radius: 50px;background-color: orange">Hubungi</button></a>
                                    </div>
                                    <ul class="social-icons">
                                        <li>
                                            <div class="fb-share-button" data-href="http://pedulipanti.id/panti/{{$panti->id}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                                        </li>
                                        <li>
                                            <div><a href="https://twitter.com/intent/tweet?text=Ayo Bantu Panti {{$panti->nama_panti}} Mereka Butuh Bantuan Kamu!" class="twitter-share-button" data-show-count="false">Tweet</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="blog_details">
                                <h3>Detail Panti</h3>
                                <div class="rows">
                                    <p class="excert" style="font-size: 13pt">
                                        <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/material-sharp/24/000000/worldwide-location.png" /> Alamat</h2>
                                        {{$panti->alamat_panti}}
                                    </p>
                                    <p>
                                        <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/metro/24/000000/pin.png" /> Deskripsi Panti</h2>
                                        {{$panti->deskripsi_panti}}
                                    </p>

                                    <div class="column" style="padding: 0 4em 0 0">
                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/material-rounded/24/000000/demand.png" /> Deskripsi Kebutuhan Panti</h2>
                                            {{$panti->deskripsi_kebutuhan}}
                                        </p>

                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/android/24/000000/phone.png" /> Nomor Telepon Panti</h2>
                                            {{$panti->no_telepon}}
                                        </p>
                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/ios-filled/24/000000/name.png" /> Nama Pemilik Panti</h2>
                                            {{$panti->nama_pemilik}}
                                        </p>
                                        <p>
                                            <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/android/24/000000/phone.png" /> Nomor Telepon Pemilik Panti</h2>
                                            {{$panti->no_telepon_pemilik}}
                                        </p>
                                    </div>
                                    <div class="column" style="">

                                        <p>
                                            <h2 style="margin-bottom: 0">Tag Kebutuhan Utama Panti</h2>
                                            <button class="btn btn-primary" style="border-radius: 50px; padding: 1.3em; margin-top: 1em" disabled>
                                            <a href="{{ route('searchPanti')}}">{{$panti->kebutuhan_panti}}</a></button>
                                        </p>
                                        <p>
                                            <h2 style="margin-bottom: 0.5em">Jumlah Anak</h2>
                                            <p style="margin-bottom: 0; color: red"><img src="https://img.icons8.com/ios/20/000000/men-age-group-4.png" /> Laki - Laki : {{$panti->jumlah_anak_laki}}</p>
                                            <p><img src="https://img.icons8.com/ios/20/000000/standing-woman.png" />Perempuan : {{$panti->jumlah_anak_perempuan}}</p>
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
                        <div>
                            <div class="album py-5 bg-light" style="padding-top: 0em!important">
                                <h3>Galeri Kegiatan Panti</h3>
                                <div class="row gallery-item">

                                    <div class="col-lg-12">

                                        @if($galeri->count() > 0)

                                        @foreach($galeri as $galeri)
                                        <div class="box-pic">
                                            <div class="imgBox">
                                                <img src="{{asset('upload/panti/images/'. $galeri->path)}}" alt="">
                                            </div>
                                        </div>
                                        @endforeach
                                        <center>
                                            <div class="btn-group">
                                                <a href="{{route('galeri_panti', $panti->id)}}" class="left"><button type="button" class="btn btn-sm btn-outline-secondary" style="float: left">Lihat Semua</button></a>
                                            </div>
                                        </center>

                                    </div>

                                    @else
                                    <div class="col-lg-12">
                                        <p class="text-center">Panti ini Belum Mempunyai Photo di Galeri</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-left">
                            <h3>Program Donasi Panti</h3>
                        </div>
                    </div>
                </div>
                @if($program->count() > 0)
                <div class="album py-5 bg-light">

                    <div class="container">

                        <div class="row">

                            @foreach ($program as $program)
                            <div class="col-md-4" style="width: 380px; padding-left: 0em">
                                <div class="card mb-4 box-shadow" style="min-height: 565px; width: 380px; ">
                                    <img class="card-img-top" src="{{ asset('upload/panti/program/' . $program->photo_program) }}" alt="Card image cap" style="height: 200px; background-position: center center; background-repeat: no-repeat;">
                                    <div class="card-body">
                                        <h4 style="margin-bottom: 0em">{{ $program->judul }}</h4>
                                        <p class="card-text">{!! substr($program->deskripsi_program,0, 100)!!}</p>
                                        <p class="card-text"> Program ini Membutuhkan Dana Sebesar <b> Rp.{{$program->biaya}} </b></p>
                                        <div class="d-flex justify-content-between align-items-left">
                                            <div class="btn-group">
                                                <a href="{{route('detail_program', $program->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
                
                @else
                
                <div class="album col-lg-12 bg-light">
                    <p class="text-center" style="padding-bottom: 3em; padding-top: 3em">Panti ini Belum Memiliki Program Donasi</p>
                </div>
                
                
                @endif


            </div>


        </section>

    </main>

    <!-- FOOTER -->
    @include('footer.footerWebsite')
    <!-- END OF FOOTER -->
    <script src="">
        twttr.widgets.createShareButton(
            '/',
            document.getElementById('containerss'), {
                text: 'Hello World'
            }
        );
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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