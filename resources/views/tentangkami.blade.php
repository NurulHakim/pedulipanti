<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang kami</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="/" style="margin-left: 1em"><b style="color: white">pedulipanti</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse " id="navbarSupportedContent" style="margin-right: 2em">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item" style="margin-right: 1em">
                        <a class="nav-link" href="/listpanti">Cari Panti<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item" style="margin-right: 1em">
                        <a class="nav-link" href="/tentangkami">Tentang Kami</a>
                    </li>
                    @guest
                    <li class="nav-item" style="margin-right: 1em">
                        <a class="btn btn-outline-primary" href="{{route('login')}}" role="button"
                            style="color: white; border-color: rgb(245, 121, 12)">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item" style="margin-right: 1em">
                        <a class="btn btn-primary" href="{{route('register')}}" role="button"
                            style="background-color: rgb(245, 121, 12); border-color: rgb(245, 121, 12)">Sign Up</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    <div class="container text-center">

        <div class="col-md-4 " style="width: 10% ">
            <div class="card border-0" style="margin-top: 5em;">
                <img class="card-img-top" src="{{asset('upload/panti/pedulipanti.png')}}" alt="Card image cap">

            </div>

        </div>


        <div class="card border-0" style="width: 100%; margin-top: 2em;">


            <div class="card-body text-center">
                <h2 class="card-title">Apa itu <b class="text-primary">pedulipanti?</b></h2>

                <p class="card-text"> <b class="text-primary">pedulipanti</b> adalah sebuah platform website online yang
                    bisa membantu
                    mencari panti asuhan yang memerlukan bantuan kebutuhan pokoknya serta bergerak dalam pemetaan dan
                    pemberdayaan
                    panti asuhan seluruh indonesia. Ada 4 permasalahan yang pedulipanti temukan terkait panti
                    asuhan:
                </p><br>

                
                    

            </div>

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7"> 
                    <h6>1. Belum <b class="text-primary">meratanya</b> tentang kegiatan sosial yang diadakan di panti-panti yang ada
                    di Indonesia. </h6>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('upload/panti/average.jpg')}}"
                        alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h6>2. Sulitnya menemukan<b class="text-primary"> lokasi</b> keberadaan panti asuhan.</h6>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('upload/panti/location.png')}}"
                        alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h6>3. Sulitnya mengetahui dan memetakan apa saja yang<b class="text-primary"> dibutuhkan</b> oleh panti
                            asuhan.</h6>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('upload/panti/kebutuhan.jpg')}}"
                        alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h6>4. penyaluran<b class="text-primary"> bantuan</b> dan kebaikan kepada panti asuhan kurang
                                merata.</h6>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('upload/panti/bantuan.jpg')}}"
                        alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">
        </div>
    </div>
    </div>

    <!-- FOOTER -->
    @include('footer.footerWebsite')
    <!-- END OF FOOTER -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
