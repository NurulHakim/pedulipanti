<?php

namespace App\Http\Controllers;
use App\Panti;
use Illuminate\Support\Facades\DB;
use App\galeri;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listview()
    {
        $panti = Panti::all();
        return view('listpanti')->with('listpanti', $panti);
    }

    public function view_detail($id)
    {
        $panti = DB::table('panti')->where('id', '=', $id)->get();
        $galeri = DB::table('galeris')->where('id_panti', '=', $id)->take(4)->get();
        $program = DB::table('program_panti')->where('id_panti', '=', $id)->take(4)->get();
        return view('detailpanti')->with('panti', $panti)->with('galeri', $galeri)->with('program', $program);
    }

    public function galeri($id)
    {
        $galeri = DB::table('galeris')->where('id_panti', '=', $id)->get();
        
        return view('/galerypanti')->with('galeri', $galeri);
    }
}
