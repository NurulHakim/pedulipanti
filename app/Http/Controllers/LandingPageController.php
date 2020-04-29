<?php

namespace App\Http\Controllers;
use App\Panti;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function viewpanti()
    {
        $panti = Panti::all();
        return view('body/landingpage')->with('listpanti', $panti);
    }
}
