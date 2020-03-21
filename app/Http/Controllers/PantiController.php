<?php

namespace App\Http\Controllers;

use App\Panti;
use Illuminate\Http\Request;

class PantiController extends Controller
{
    public function index()
    {
        return view('isiprofile');
    }

    public function store(Request $request)
    {
        $panti = new Panti();

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

        return view('isiprofile')->with('isiprofile', $panti);
    }

    public function listview()
    {
        $panti = Panti::all();
        return view('listpanti')->with('listpanti', $panti);
    }
}
