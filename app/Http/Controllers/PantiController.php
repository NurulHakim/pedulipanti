<?php

namespace App\Http\Controllers;

use App\Panti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\User;
use App\galeri;
use Intervention\Image\ImageManagerStatic as Image;
class PantiController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $emails = \Auth::user()->email;
        $datass = DB::table('panti')->where('email_user', '=', $emails)->get();
        $data['data'] = $datass;
        if (!$datass->isEmpty()) {
            return view('editprofile', $data);
        } else {
            return view('isiprofile');
        }
    }

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
        $panti->kabupaten_kota = $request->input('kabupaten_kota');
        $panti->kecamatan = $request->input('kecamatan');
        $panti->kelurahan = $request->input('kelurahan');
        $panti->kebutuhan_panti = $request->input('kebutuhan_panti');
        $panti->deskripsi_kebutuhan = $request->input('deskripsi_kebutuhan');
        $panti->jumlah_pengurus = $request->input('jumlah_pengurus');
        $panti->jumlah_anak_laki = $request->input('jumlah_anak_laki');
        $panti->jumlah_anak_perempuan = $request->input('jumlah_anak_perempuan');
        $panti->email_user = $emails;

        if ($request->hasfile('logo_panti')) {
            $file = $request->file('logo_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/logo', $filename);
            $panti->logo_panti = $filename;
        } else {
            return $request;
            $panti->logo_panti = '';
        }

        if ($request->hasfile('foto_panti')) {
            $file = $request->file('foto_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/foto', $filename);
            $panti->foto_panti = $filename;
        } else {
            return $request;
            $panti->foto_panti = '';
        }

        if ($request->hasfile('sertifikat_panti')) {
            $file = $request->file('sertifikat_panti');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/sertifikat', $filename);
            $panti->sertifikat_panti = $filename;
        } else {
            return $request;
            $panti->sertifikat_panti = '';
        }
        $panti->save();

        return redirect()->route('profile.view');
    }

    public function listview()
    {
        $panti = Panti::all();
        return view('listpanti')->with('listpanti', $panti);
    }

    public function upload_photo(Request $request)
    {
        $galeri = new galeri();
        $emails = \Auth::user()->email;
        $galeri->email_user =  $emails;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/panti/images', $filename);
            $galeri->path = $filename;
            $resize_image = Image::make('upload/panti/images/' .  $filename);

            $resize_image->resize(250, 250, function ($constraint) {
            $constraint->aspectRatio();
            })->save('upload/panti/images/thumbnail/' . $filename);
        } else {
            return $request;
            $galeri->path = '';
        }
        $galeri->save();
        return view('dashpanti');
    }
       
    public function edit(Request $request)
    {
        $emails = \Auth::user()->email;

        DB::table('panti')->where('email_user', $emails)->update([
            'tipe_panti' => $request->tipe_panti,
            'jenis_yayasan' => $request->jenis_yayasan,
            'nama_panti' => $request->nama_panti,
            'no_telepon' => $request->no_telepon,
            'nama_pemilik' => $request->nama_pemilik,
            'no_telepon_pemilik' => $request->no_telepon_pemilik,
            'alamat_panti' => $request->alamat_panti,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kebutuhan_panti' => $request->kebutuhan_panti,
            'deskripsi_kebutuhan' => $request->deskripsi_kebutuhan,
            'jumlah_pengurus' => $request->jumlah_pengurus,
            'jumlah_anak_laki' => $request->jumlah_anak_laki,
            'jumlah_anak_perempuan' => $request->jumlah_anak_perempuan
        ]);

        return redirect('/profile_panti');
    }
}
