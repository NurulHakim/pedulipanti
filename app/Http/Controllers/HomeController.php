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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('body/landingpage');
        // return view('body/landingpageafterlogin');
        // $panti = Panti::all();
        $email = \Auth::user()->email;
        // return view('body/landingpageafterlogin')->with('listpanti', $panti);
        $galeri = DB::table('galeris')->where('email_user', '=', $email)->get();
        return view('dashpanti')->with('galeri', $galeri);
    }


}
