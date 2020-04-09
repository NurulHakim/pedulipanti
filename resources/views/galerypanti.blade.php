<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Galery Panti</title>


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
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">


</head>

<body>
  

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
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <main role="main">

        <div class="jumbotron jumbotron-fluid" >
            <div class="container" style="margin-top: 2em">
                <h1 class="jumbotron-heading">Panti Bina Remaja Mandiri</h1>
                <p class="lead text-muted">(Deskripsi Panti) Something short and leading about the collection below—its contents, the
                    creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it
                    entirely.</p>
            </div>
        </div>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('img/slidekesatu.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Deskripsi Foto.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>

    </div> <br>
    <footer class="text-muted">
        <div class="container">
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="row">
                <div class="col-6 col-md-4">
                    <h5 class="card-title">Berdayakan panti bersama pedulipanti</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="col-6 col-md-4">
                    <h5 class="card-title">Media Sosial</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="col-6 col-md-4">
                    <h5 class="card-title">Hubungi Kami</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
</body>

</html>