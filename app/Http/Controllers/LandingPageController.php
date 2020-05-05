<?php

namespace App\Http\Controllers;
use App\Panti;
use App\galeri;
use App\kabupaten;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function viewpanti()
    {
        $panti = Panti::all();
        
        // $kabupaten = City::all();
        // $kabupaten = kabupaten::all();
        // $kecamatan = District::all();
        // foreach($panti as $panti){
        //     foreach($kabupaten as $kabupaten){
        //         echo $kabupaten;
        //     }
        // }
        // $kabupaten = City::select('name')->where('id', $id_kab)->get();
        // $sd = District::select('name')->where('id', $id_kec)->get();

        // echo $kabupaten;
        // foreach($panti as $panti){
        //     $a = $panti->kecamatan;
        // }

        // echo $a;
        // foreach($kabupaten as $kab){
        //     $b = $kab->name;
        // }
        //     echo('----------------------------------------------------------');
        // echo $kabupaten;

        
        // $panti = Panti::all();
        return view('body/landingpage')->with('listpanti', $panti);
    }

    // public function getNameLocation($id){

    // }
}
