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
                    @foreach($program as $program)
                    <div class="col-lg-12 posts-list">
                        <div class="single-post">
                            <h1 style="color: rgb(0, 178, 242);">{{$program->judul}}</h1>
                            <div class=" feature-img" style="width: 100%; height: 50%">
                                <img class="img-fluid" src="{{asset('upload/panti/program/'. $program->photo_program)}}" style="" alt="">
                            </div>
                            <div class="section-top-border" style="padding: 0; margin-top: 1em"></div>
                            <div class="navigation-top" style="padding-top: 0">
                                <div class="d-sm-flex justify-content-between text-center">
                                    <div class="text-center my-2 my-sm-0">
                                        <a target="_blank" href="https://wa.me/62{{$program->telp}}"><button class="btn btn-sm btn-primary" style="border-radius: 50px;background-color: orange">Hubungi Untuk Donasi</button></a>
                                    </div>
                                    <ul class="social-icons">
                                        <li>
                                            <div class="fb-share-button" data-href="http://pedulipanti.id/panti/program/{{$program->id}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                                        </li>
                                        <li>
                                            <div><a href="ttps://twitter.com/intent/tweet?text=Ayo Bantu Panti mewujudkan program {{$program->judul}} Mereka Butuh Bantuan Kamu!" class="twitter-share-button" data-show-count="false">Tweet</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="section-top-border" style="padding: 0"></div>
                            <div class="blog_details">
                                <h3>Detail Program</h3>
                                <div class="rows">
                                    <p class="excert">
                                        <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/carbon-copy/30/000000/money.png"/> Dana Yang Dibutuhkan</h2>
                                        <p style="font-size: 14pt"><b>Rp. {{$program->biaya}}</b></p>
                                    </p>
                                    <p class="excert" style="font-size: 16pt">
                                        <h2 style="margin-bottom: 0"><img src="https://img.icons8.com/metro/24/000000/pin.png" /> Deskripsi Program</h2>
                                        {!!$program->deskripsi_program!!}
                                    </p>

                                    
                                </div>

                                <div class="quote-wrapper">
                                    <div class="quotes">
                                        "Jangan pernah lupa untuk selalu bersyukur. Dan berbagi adalah salah satu cara untuk bersyukur atas nikmatNya."
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach


                    </div>
                </div>
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