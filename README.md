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
        $data['data'] = \$datas;

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

    public function getKabupaten(Request $request)
    {
        $cities = City::where('province_id', \$request->get('id'))->pluck('name', 'id');
    return response()->json(\$cities);
    }

-   #### Fungsi ini berfungsi untuk mendapatkan daftar kabupaten dari provinsi yang dipilih saat pengisian profile.


    public function getKecamatan(Request $request)
    {
        $cities = District::where('city_id', \$request->get('id'))->pluck('name', 'id');
        return response()->json(\$cities);
    }

-   #### Fungsi ini berfungsi untuk mendapatkan daftar kecamatan dari kabupaten yang dipilih saat pengisian profile.


    public function getKelurahan(Request $request)
    {
        $cities = Village::where('district_id', \$request->get('id'))->pluck('name', 'id');
        return response()->json(\$cities);
    }

-   #### fungsi ini berfungsi untuk mendapatkan daftar desa atau kelurahan dari kecamatan yang dipilih saat pengisian profile.

    public function store(Request $request)
    {
        $panti = new Panti();

        $emails = \Auth::user()->email;
        $panti->tipe_panti = $request->input('tipe_panti');
        $panti->jenis_yayasan = $request->input('jenis_yayasan');
        $panti->nama_panti = $request->input('nama_panti');
        $panti->no_telepon = $request->input('no_telepon');
        $panti->nama_pemilik = $request->input('nama_pemilik');
        $panti->no_telepon_pemilik = $request->input('no_telepon_pemilik');
        $panti->alamat_panti = $request->input('alamat_panti');
        $panti->provinsi = $request->input('provinsi');
        $panti->kabupaten_kota = $request->input('kabupaten');
        $panti->kecamatan = $request->input('kecamatan');
        $panti->kelurahan = $request->input('kelurahan');
        $panti->kebutuhan_panti = $request->input('kebutuhan_panti');
        $panti->deskripsi_kebutuhan = $request->input('deskripsi_kebutuhan');
        $panti->jumlah_pengurus = $request->input('jumlah_pengurus');
        $panti->jumlah_anak_laki = $request->input('jumlah_anak_laki');
        $panti->jumlah_anak_perempuan = $request->input('jumlah_anak_perempuan');
        $panti->deskripsi_panti= $request->input('deskripsi_panti');
        $panti->email_user = $emails;

        if ($request->hasfile('logo_panti')) {
            $file = $request->file('logo_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/logo', $filename);
            $panti->logo_panti = $filename;
        } else {
            // return $request;
            $panti->logo_panti = '';
        }

        if ($request->hasfile('foto_panti')) {
            $file = $request->file('foto_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/foto', $filename);
            $panti->foto_panti = $filename;
        } else {
            // return $request;
            $panti->foto_panti = '';
        }

        if ($request->hasfile('sertifikat_panti')) {
            $file = $request->file('sertifikat_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/sertifikat', $filename);
            $panti->sertifikat_panti = $filename;
        } else {
            // return $request;
            $panti->sertifikat_panti = '';
        }
        $panti->save();

        return redirect()->route('profile.view');

    }

-   #### Fungsi tersebut berfungsi untuk memasukkan data profile panti kedalam database.

    public function edit(Request $request)
    {
        $panti = new Panti();
    $emails = \Auth::user()->email;
        $provinces = Province::pluck('name', 'id');
    $pantis = Panti::where('email_user', '=', $emails)->get();

    if ($request->hasfile('logo_panti')) {
            $file = $request->file('logo_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/logo', $filename);
            $logo_pantis = $filename;
        } else {
            // return $request;
    foreach($pantis as $panti){
    $logo_pantis = $panti->logo_panti;
    }

    }

        if ($request->hasfile('foto_panti')) {
            $file = $request->file('foto_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/foto', $filename);
            $foto_pantis = $filename;
        } else {
            // return $request;
            foreach($pantis as $panti){
                $foto_pantis = $panti->foto_panti;
            }
        }

        if ($request->hasfile('sertifikat_panti')) {
            $file = $request->file('sertifikat_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/sertifikat', $filename);
            $sertifikat_pantis = $filename;
        } else {
            // return $request;
            foreach($pantis as $panti){
                $sertifikat_pantis = $panti->sertifikat_panti;
            }
        }
        DB::table('panti')->where('email_user', $emails)->update([
            'email_user' => $emails,
            'tipe_panti' => $request->tipe_panti,
            'jenis_yayasan' => $request->jenis_yayasan,
            'nama_panti' => $request->nama_panti,
            'no_telepon' => $request->no_telepon,
            'nama_pemilik' => $request->nama_pemilik,
            'no_telepon_pemilik' => $request->no_telepon_pemilik,
            'alamat_panti' => $request->alamat_panti,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kebutuhan_panti' => $request->kebutuhan_panti,
            'deskripsi_kebutuhan' => $request->deskripsi_kebutuhan,
            'jumlah_pengurus' => $request->jumlah_pengurus,
            'jumlah_anak_laki' => $request->jumlah_anak_laki,
            'jumlah_anak_perempuan' => $request->jumlah_anak_perempuan,
            'deskripsi_panti'=> $request->deskripsi_panti,
            'logo_panti' => $logo_pantis,
            'sertifikat_panti' => $sertifikat_pantis,
            'foto_panti' => $foto_pantis
        ]);
        $panti->save();
        return redirect('/profile_panti');

    }

-   #### Fungsi tersebut berfungsi untuk mengubah data panti dari database.

    public function tambah_program(Request $request)
    {
        $program = new program();
    $id_user = \Auth::user()->id;
        $email = \Auth::user()->email;
    $ids = Panti::select('id')->where('email_user', '=', $email)->get();
    $id= "";
        foreach($ids as $ids){
            $id = $ids->id;
        }
        $program->id_pantis=$id;
        $program->id_panti = $id_user;
        $program->telp = $request->input('telp_program');
        $program->judul = $request->input('judul_program');
        $program->biaya = $request->input('biaya_program');
        $program->deskripsi_program = $request->input('deskripsi_program');
        if ($request->hasfile('photo_prog')) {
    $file = $request->file('photo_prog');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $file->move('upload/panti/program', $filename);
    $program->photo_program = $filename;
    } else {
    // return $request;
            $program->photo_program = $request->input('');
        }
        $program->save();

        $galeri = DB::table('galeris')->where('email_user', '=', $email)->get();
        return view('dashpanti')->with('galeri', $galeri);

    }

    public function listprogram()
    {
    $id = \Auth::user()->id;
        $program = program::where('id_panti', $id)->get();
        return view('dahsprog')->with('program', $program);
    }

-   #### Fungsi diatas berfungsi untuk menambahkan program yang akan dilaksanakan oleh panti kedepannya dan menyimpannya kedalam database.

    public function editprogget($id)
    {
        
        $data = program::where('id', $id)->get();
        return view('editprog')->with('data', $data);
    }

-   #### a

    public function editprogram(Request $request, $id)
    {
    $programs = program::where('id', $id)->get();
    if ($request->hasfile('photo_prog')) {
            $file = $request->file('photo_prog');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/program', $filename);
            $name = $filename;
        } else {
            // return $request;
    foreach($programs as $prog){
    $name = $prog->photo_program;
    }
    }
    DB::table('program_panti')->where('id', $id)->update([
                'judul' => $request->judul,
    'deskripsi_program' => $request->deskripsi_program,
                'biaya' => $request->biaya,
    'telp' => $request->no_telepon,
                'photo_program' => $name,
    ]);
    $program = program::all();
        return view('dahsprog')->with('program', $program);
    }

-   #### a

    public function viewpanti(){
    $panti = Panti::all()->take(6);
        return view('body/landingpage')->with('listpanti', $panti);
    }

-   #### fungsi diatas berfungsi untuk mengambil data dari 6 buah panti dan menampilkannya kedalam landing page.
    public function indexDash()
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
-   #### Fungsi diatas berfungsi untuk menampilkan dashboard panti jika sudah login terlebih dahulu.

    public function upload_photo(Request $request)
    {
        $galeri = new galeri();
    $email = \Auth::user()->email;
        $ids = Panti::select('id')->where('email_user', '=', $email)->get();
        foreach($ids as $ids){
            $galeri->id_panti = $ids->id;
        }
        
        $galeri->email_user = $email;
        if ($request->hasfile('photo')) {
    $file = $request->file('photo');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $file->move('upload/panti/images', $filename);
    $galeri->path = $filename;
    $resize_image = Image::make('upload/panti/images/' .  $filename);

            $resize_image->resize(250, 250, function ($constraint) {
            $constraint->aspectRatio();
            })->save('upload/panti/images/' . $filename);
        } else {
            return $request;
            $galeri->path = '';
        }
        $galeri->save();
        $galeri = DB::table('galeris')->where('email_user', '=', $email)->get();
        return view('dashpanti')->with('galeri', $galeri);

    }

-   #### Fungsi diatas berfungsi untuk menyimpan foto-foto dari panti kedalam tabel galeris yang ada di database.

    public function deletePhoto($id){
        $galeri = DB::table('galeris')->where('id', '=', $id)->get();
        foreach($galeri as $galeri){
            $path = $galeri->path;
        }
        File::delete('upload/panti/images/'.$path);

        DB::table('galeris')->where('path', $path)->delete();
        return redirect('dashboard');

    }

-   #### Fungsi diatas berfungsi untuk menghapus foto-foto yang sudah ditambahkan dedalam database sebelumnya.

    public function deleteAccount(){
    $email = \Auth::user()->email;
        $id = \Auth::user()->id;
    DB::table('program_panti')->where('id_panti', $id)->delete();
        DB::table('galeris')->where('email_user', $email)->delete();
    DB::table('panti')->where('email_user', $email)->delete();
        DB::table('users')->where('email', $email)->delete();
    return redirect('/');
    }

-   #### Fungsi diatas berfungsi untuk menghapus akun panti yang sudah terdaftar sebelumnya.

## UserController

    public function listview()
    {

        $provinces = Province::pluck('name', 'id');

        $panti = Panti::all();
        $kabupaten = City::all();
        $kecamatan = District::all();

        $panti = DB::table('panti')
        ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
        ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
        ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);

        return view('listpanti')->with('listpanti', $panti)->with('provinces', $provinces);
    }

-   #### Fungsi diatas berfungsi untuk mengambil semua data dari setiap panti yang terdaftar dan menampilkannya pada halaman listview.

    public function view_detail($id)
    {
        $panti = DB::table('panti')->where('id', '=', $id)->get();
        $galeri = DB::table('galeris')->where('id_panti', '=', \$id)->take(4)->get();

        $program = DB::table('program_panti')->where('id_panti', '=', $id)->take(4)->get();
        return view('detailpanti')->with('panti', $panti)->with('galeri', $galeri)->with('program', $program);

    }

-   #### Fungsi diatas berfungsi untuk mengambil data dari suatu panti yang dipilih oleh user dan menampilkannya di halaman detailpanti

    public function detail_program($id)
    {
        $program = DB::table('program_panti')->where('id', $id)->get();
        return view('program')->with('program', $program);
    }

-   #### a

    public function galeri($id)
    {
        $galeri = DB::table('galeris')->where('id_panti', '=', $id)->get();
        
        return view('/galerypanti')->with('galeri', $galeri);
    }

-   #### Fungsi diatas berfungsi untuk mengambil foto-foto dari panti yang telah dipilih oleh user dan menampilkan semuanya di halaman galerypanti

    public function searchPanti(Request $request){
        $search = $request->get('query');
        $searchloc = $request->get('lokasi');
        if(Empty($search) && Empty($searchloc)){
            $hasil =DB::table('panti')
    ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
    ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
    ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);
    return view('hasil')->with('hasil', $hasil);
        }else if(!Empty($search) && Empty($searchloc)){
            $hasil =DB::table('panti')
    ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
    ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
    ->where('nama_panti', 'LIKE', '%' . $search . '%')->orwhere('kebutuhan_panti', 'LIKE', '%' . $search . '%')->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);
    return view('hasil')->with('hasil', $hasil);
          
        }else if(Empty($search) && !Empty($searchloc)){
            $hasil =DB::table('panti')
    ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
    ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
    ->where('kecamatan', \$searchloc)->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);

            return view('hasil')->with('hasil', $hasil);

        }else{
            $hasil =DB::table('panti')
            ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
            ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
            ->where('nama_panti', 'LIKE', '%' . $search . '%')->where('kecamatan', $searchloc)->orwhere('kebutuhan_panti', 'LIKE', '%' . $search . '%')->where('kecamatan', $searchloc)->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);

            return view('hasil')->with('hasil', $hasil);

        }

    }

-   #### search

public function filter(Request $request){
        $provinces = Province::pluck('name', 'id');
$provinsi = $request->get('provinsi');
$kebutuhan = $request->get('select-keb');
if(Empty($provinsi) && !Empty($kebutuhan)){
$listpanti =DB::table('panti')
            ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
            ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
            ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan'])->where('kebutuhan_panti', '=',  $kebutuhan);
return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
} elseif(!Empty($provinsi) && Empty($kebutuhan)){
$listpanti = DB::table('panti')
            ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
            ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
            ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan'])->where('provinsi', '=',  $provinsi);
return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
} elseif(!Empty($provinsi) && !Empty('$kebutuhan')){
$listpanti = DB::table('panti')
            ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
            ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
            ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan'])->where('kebutuhan_panti', '=',  $kebutuhan)->where('provinsi', $provinsi);
            return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
        } else{
            $listpanti = DB::table('panti')
->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);
return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
}

    }

-   #### asa

    public function getKabupaten(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))->pluck('name', 'id');
        return response()->json($cities);
    }

-   #### dsadas
