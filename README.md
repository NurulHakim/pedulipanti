# Dokumentasi Fungsi yang Digunakan

## HomeController

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

-   #### Fungsi tersebut berfungsi untuk keamanan dari pemilik akan, sehingga setiap route yang memanggil home controller akan diminta untuk login.

    public function index()
    {
    $email = \Auth::user()->email;
        $datas = DB::table('panti')->where('email_user', '=', $email)->get();
        $data['data'] = $datas;
        if ($datas->isEmpty()) {
    $provinces = Province::pluck('name', 'id');
            return view('isiprofile')->with('provinces', $provinces);
    } else {
    $galeri = DB::table('galeris')->where('email_user', '=', $email)->get();
    return view('dashpanti')->with('galeri', \$galeri);
    }
    }

-   #### Fungsi diatas berfungsi untuk masuk kehalaman dashboard panti dengan beberapa parameter yang sudah di sesuaikan.

## LandingPageController

    public function viewpanti()
    {
        $panti = Panti::all();
        $kabupaten = City::all();
        $kecamatan = District::all();

        $panti = DB::table('panti')
        ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
        ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
        ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);

        return view('body/landingpage')->with('listpanti', $panti);
    }

-   #### Fungsi diatas berfungsi untuk menampilkan halaman landingpage atau halaman yang pertama kali dilihat oleh user.

## PantiController
