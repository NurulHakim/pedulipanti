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
                            <a class="dropdown-item" href="{{ route('deleteAccount')}}" onclick='return confirmDelete();'>
                                Hapus Akun                                
                            </a>

                            <script>
                                function confirmDelete(){
                                    var x = confirm('Anda yakin ingin menghapus akun?')
                                    if(x==true){
                                        return true;
                                    } else{
                                        return false;
                                    }
                                }
                            </script>

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