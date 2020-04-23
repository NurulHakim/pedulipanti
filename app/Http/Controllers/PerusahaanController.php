<?php

namespace App\Http\Controllers;

use App\Panti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\User;
use App\galeri;
use App\Perusahaan;
use Intervention\Image\ImageManagerStatic as Image;

class PerusahaanController extends Controller
{
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return view('lembaga/dashperusahaan');
    }

    public function data(Request $request)
    {
        $panti = new Perusahaan();

        // $emails = \Auth::user()->email;
        $panti->tipe_panti = $request->input('tipe_lembaga');
        $panti->nama_panti = $request->input('nama_lembaga');
        $panti->no_telepon = $request->input('no_telepon_perusahaan');
        $panti->alamat_panti = $request->input('alamat_perusahaan');
        $panti->provinsi = $request->input('provinsi');
        $panti->kabupaten_kota = $request->input('kabupaten_kota');
        $panti->kecamatan = $request->input('kecamatan');
        $panti->kelurahan = $request->input('kelurahan');
        $panti->deskripsi_panti= $request->input('desc_perusahaan');
        // $panti->email_user = $emails;

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

        $panti->save();

        // return redirect()->route('profile.view');
        return view('lembaga/isiprofilelembaga');
    }
}
