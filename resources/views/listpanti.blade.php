<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Cari Panti</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
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

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">

</head>

<body>
    <!-- HEADER -->
    @include('header.headerWebsite')
    <!-- END OF HEADER -->

    <section class="jumbotron text-center" style="background-image:url('img/img1.jpg');">
        <div class="container" style="padding-top: 2em;">
            <h1 class="jumbotron-heading" style="color:white">Cari Panti</h1>
            <p style="color:white">Mari Sumbangkan Sedikit Harta Kekayaan kita <br> Kepada Panti-Panti Yang Membutuhkan.</p>
        </div>
    </section>

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-2">
                        <div class="card mb-4 box-shadow" style="min-height: 380px; width: 380px;">

                        </div>
                    </div> -->
                    @foreach ($listpanti as $listpanti)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow" style="min-height: 561px; width: 380px;">
                            <img class="card-img-top" src="{{ asset('upload/panti/foto/' . $listpanti->foto_panti) }}" alt="Card image cap" style="height: 200px; background-position: center center; background-repeat: no-repeat;">
                            <div class="card-body">
                                <h4 style="margin-bottom: 0em">{{ $listpanti->nama_panti }}</h4>
                                <p class="card-text" style="color: orange"><img src="https://img.icons8.com/pastel-glyph/20/ffa200/worldwide-location--v2.png" /> {{$listpanti->kecamatan}}, {{$listpanti->kabupaten_kota}}</p>
                                <p class="card-text">{{ substr($listpanti->deskripsi_panti,0, 100)}}</p>
                                <p>
                                    <h5 style="margin-bottom: 0">Tag Kebutuhan Utama Panti</h5>
                                    <button class="btn btn-primary" style="border-radius: 50px; padding: 1.3em; margin-top: 1em" disabled>
                                    <a href="{{ route('searchPanti')}}">{{$listpanti->kebutuhan_panti}}</a></button>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('tampil_panti', $listpanti->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="" data-toggle="modal" data-target="#Modal" class="btn btn-outline-secondary" style="position: fixed;right: 46%; bottom: 40px; border-radius: 40px; background-color: orange">Filter</a>
            </div>
        </div>

    </main>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Filter</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('filter')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="modal-header" style=" padding-top:0em; padding-bottom: 0; padding-left: 0">
                            <h4 class="modal-title" id="exampleModalLabel">Lokasi</h4>
                        </div>
                        <h5 style="padding-top: 0.5em">Provinsi</h5>
                        <select  name='provinsi' id="provinsi" data-dependent='kabupaten'>
                            <option value="">-------------- Semua Lokasi --------------</option>
                            @foreach ($provinces as $id => $name)
                            <option value="{{ $id }}">{{$name}}</option>
                            @endforeach
                        </select>
                       
                        <br> <br>

                        <div class="modal-header" style="padding-bottom: 0; padding-left: 0">
                            <h4 class="modal-title" id="exampleModalLabel"> Tag Kebutuhan Utama</h4>
                        </div>
                        <h5 style="padding-top: 0.5em"> Tag Kebutuhan</h5>
                        <select style="size: 100%" name="select-keb" id="select-keb">
                            <option value="">-------------- Semua Kebutuhan --------------</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Uang">Uang</option>
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Pendidikan">Pendidikan</option>
                        </select>
                        <br>
                        <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style=" border-radius: 40px;  border-style: solid; border-color:#014b85;  border-width: 3px">Upload</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="  border-radius: 40px;  color: #014b85; background-color: white; border-style: solid; border-color:#014b85;  border-width: 3px">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    @include('footer.footerWebsite')
    <!-- END OF FOOTER -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#provinsi').on('change', function() {
                axios.post('{{ route('getKabupatens') }}', {
                            id: $(this).val()
                        })
                    .then(function(response) {
                        $('#kabupaten').empty();

                        $.each(response.data, function(id, name) {
                            $('#kabupaten').append(new Option(name, id))
                        })
                    });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>

    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/holder.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
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