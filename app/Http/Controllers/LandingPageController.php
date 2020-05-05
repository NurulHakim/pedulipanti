<?php

namespace App\Http\Controllers;
use App\Panti;
use App\galeri;
use App\kabupaten;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function viewpanti()
    {
        $panti = Panti::all();
        $kabupaten = City::all();
        $kecamatan = District::all();

        $panti = DB::table('panti')
        ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
        ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
        ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);
        
        // echo "<pre>";
        // print_r($panti);

        return view('body/landingpage')->with('listpanti', $panti);
    }
}