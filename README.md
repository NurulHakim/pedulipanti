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

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

-   #### Sama seperti sebelumnya fungsi diatas untuk keamanan dari pemilik akun.

    public function index()
    {
    $email = \Auth::user()->email;
        $datas = DB::table('panti')->where('email_user', '=', $email)->get();
        $data['data'] = $datas;
        if (!$datas->isEmpty()) {
    $provinces = Province::pluck('name', 'id');
            $panti = Panti::all();

            foreach($panti as $panti){
                $id_prov= $panti->provinsi;
                $id_kab= $panti->kabupaten_kota;
                $id_kec= $panti->kecamatan;
                $id_kel= $panti->kelurahan;
            }

            $provinsi = Province::where('id', $id_prov)->get();
            $kabupaten = City::where('id', $id_kab)->get();
            $kecamatan = District::where('id', $id_kec)->get();
            $kelurahan = Village::where('id', $id_kel)->get();

            return view('editprofile', $data)->with('nama_provinsi', $provinsi)->with('nama_kabupaten', $kabupaten)->with('nama_kecamatan', $kecamatan)->with('nama_kelurahan', $kelurahan)->with('provinces', $provinces);
        } else {
            $provinces = Province::pluck('name', 'id');
            return view('isiprofile')->with('provinces', $provinces);
        }

    }

-   #### fungsi tersebut tersebut berisi percabangan apabila pemilik akun belum mengisi data maka akan diarahkan ke halaman profilepanti namun jika sudah mengisinya maka akan diarahkan kehalaman editprofile.
