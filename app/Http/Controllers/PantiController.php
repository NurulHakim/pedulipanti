<?php

namespace App\Http\Controllers;

use App\Panti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Intervention\Image\ImageManagerStatic;
// use App\Http\Controllers\Province;
use App\User;
// use App\Province;
use App\program;

use File;
use App\galeri;
use App\Wilayah;
use Intervention\Image\ImageManagerStatic as Image;
class PantiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // MENAMPILKAN PROFILE PANTI
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

                // echo $id_prov;
            }

            $provinsi = Province::where('id', $id_prov)->get();
            $kabupaten = City::where('id', $id_kab)->get();
            $kecamatan = District::where('id', $id_kec)->get();
            $kelurahan = Village::where('id', $id_kel)->get();
            
            return view('editprofile', $data)->with('nama_provinsi', $provinsi)->with('nama_kabupaten', $kabupaten)->with('nama_kecamatan', $kecamatan)->with('nama_kelurahan', $kelurahan)->with('provinces', $provinces);
        } else {
            $provinces = Province::pluck('name', 'id');
            // $provinces = Province::get();
            // $provinces = Province::all();
            // echo($provinces);
            return view('isiprofile')->with('provinces', $provinces);
            // return view('isiprofile');
        }
    }

    public function getKabupaten(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))->pluck('name', 'id');
    
        return response()->json($cities);
    }

    public function getKecamatan(Request $request)
    {
        $cities = District::where('city_id', $request->get('id'))->pluck('name', 'id');
    
        return response()->json($cities);
    }

    public function getKelurahan(Request $request)
    {
        
        $cities = Village::where('district_id', $request->get('id'))->pluck('name', 'id');
    
        return response()->json($cities);
    }

    // MENGINPUT DATA PANTI KE DATABASE
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

    // MENGEDIT PROFILE PANTI
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
    //MENAMBAH PROGRAMM PANTI
    public function tambah_program(Request $request)
    {
        $program = new program();
        $email = \Auth::user()->email;
        $ids = Panti::select('id')->where('email_user', '=', $email)->get();
        foreach($ids as $ids){
            $program->id_panti = $ids->id;
        }
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
        $email = \Auth::user()->email;
        $ids = Panti::select('id')->where('email_user', '=', $email)->get();
        $id= "";
        foreach($ids as $ids){
            $id = $ids->id;
        }
        $program = program::where('id_panti', $id)->get();
        return view('dahsprog')->with('program', $program);
    }

public function editprogget($id)
{
    
    $data = program::where('id', $id)->get();
    return view('editprog')->with('data', $data);
}

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

    public function viewpanti(){
        $panti = Panti::all()->take(6);
        return view('body/landingpage')->with('listpanti', $panti);
    }


    // MENAMPILKAN DASHBOARD
    public function indexDash(){
        $email = \Auth::user()->email;

        $galeri = DB::table('galeris')->where('email_user', '=', $email)->get();
        return view('dashpanti')->with('galeri', $galeri);
    }

    // MENGUPLOAD FOTO GALLERY
    public function upload_photo(Request $request)
    {
        $galeri = new galeri();
        $email = \Auth::user()->email;
        $ids = Panti::select('id')->where('email_user', '=', $email)->get();
        foreach($ids as $ids){
            $galeri->id_panti = $ids->id;
        }
        
        $galeri->email_user =  $email;
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
       


    // MENGHAPUS FOTO GALLERY
    public function deletePhoto($id){
        $galeri = DB::table('galeris')->where('id', '=', $id)->get();
        foreach($galeri as $galeri){
            $path =  $galeri->path;
        }
        File::delete('upload/panti/images/'.$path);

        DB::table('galeris')->where('path', $path)->delete();
		return redirect('dashboard'); 
    }

    // MENGHAPUS AKUN  
    public function deleteAccount(){
        $email = \Auth::user()->email;
        DB::table('panti')->where('email_user', $email)->delete();
        DB::table('galeris')->where('email_user', $email)->delete();
        DB::table('users')->where('email', $email)->delete();
        return redirect('/');
    }


    // daerah indonesias
}

