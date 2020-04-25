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

    public function view_detail($email)
    {
        $panti = DB::table('panti')->where('email_user', $email)->get();
        $galeri = DB::table('galeris')->where('email_user', '=', $email)->take(4)->get();
        
        return view('detailpanti')->with('panti', $panti)->with('galeri', $galeri);
    }

    public function galeri($email)
    {
        $galeri = DB::table('galeris')->where('email_user', '=', $email)->get();
        
        return view('/galerypanti')->with('galeri', $galeri);
    }
}
