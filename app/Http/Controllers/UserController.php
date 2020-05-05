<?php

namespace App\Http\Controllers;
use App\Panti;
use Illuminate\Support\Facades\DB;
// use App\galeri;
use Post;
use Illuminate\Http\Request;
use App\program;
use PhpParser\Node\Expr\Empty_;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class UserController extends Controller
{
    public function listview()
    {
       
        $provinces = Province::pluck('name', 'id');
       
        $panti = Panti::all();
        $kabupaten = City::all();
        $kecamatan = District::all();

        $panti = DB::table('panti')
        ->join('indonesia_cities', 'indonesia_cities.id','=','panti.kabupaten_kota')
        ->join('indonesia_districts', 'indonesia_districts.id','=','panti.kecamatan')
        ->get(['panti.*', 'indonesia_cities.name as nama_kabupaten', 'indonesia_districts.name as nama_kecamatan']);
        
        // echo "<pre>";
        // print_r($panti);

        return view('listpanti')->with('listpanti', $panti)->with('provinces', $provinces);
    }

    public function view_detail($id)
    {
        $panti = DB::table('panti')->where('id', '=', $id)->get();
        $galeri = DB::table('galeris')->where('id_panti', '=', $id)->take(4)->get();

        $program = DB::table('program_panti')->where('id_panti', '=', $id)->take(4)->get();
        return view('detailpanti')->with('panti', $panti)->with('galeri', $galeri)->with('program', $program);
    }

    public function detail_program($id)
    {
        $program = DB::table('program_panti')->where('id', $id)->get();
        return view('program')->with('program', $program);
    }

    public function galeri($id)
    {
       
        $galeri = DB::table('galeris')->where('id_panti', '=', $id)->get();
        
        return view('/galerypanti')->with('galeri', $galeri);
    }

    public function searchPanti(Request $request){
        $search = $request->get('query');
        $searchloc = $request->get('lokasi');
        if(Empty($search) && Empty($searchloc)){
            $hasil = DB::table('panti')->get();
            return view('hasil')->with('hasil', $hasil);
        }else if(!Empty($search) && Empty($searchloc)){
            $hasil = DB::table('panti')->select()->where('nama_panti', 'LIKE', '%' . $search . '%')->orwhere('deskripsi_panti', 'LIKE', '%' . $search . '%')->orwhere('kebutuhan_panti', 'LIKE', '%' . $search . '%')->get();
            return view('hasil')->with('hasil', $hasil);
          
        }else if(Empty($search) && !Empty($searchloc)){
            $hasil = DB::table('panti')->select()->where('kecamatan', $searchloc)->get();
       
            return view('hasil')->with('hasil', $hasil);
          
        }else{
            $hasil = DB::table('panti')->select()->where('nama_panti', 'LIKE', '%' . $search . '%')->orwhere('deskripsi_panti', 'LIKE', '%' . $search . '%')->orwhere('kebutuhan_panti', 'LIKE', '%' . $search . '%')->where('kecamatan', $searchloc)->get();
         
            return view('hasil')->with('hasil', $hasil);
        
        }

    }

    public function filter(Request $request){
        $provinces = Province::pluck('name', 'id');
        $provinsi = $request->get('provinsi');
        $kebutuhan = $request->get('select-keb');
        if(Empty($provinsi) && !Empty($kebutuhan)){
            $listpanti = DB::table('panti')->select()->where('kebutuhan_panti', '=',  $kebutuhan)->get();
            return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
        } elseif(!Empty($provinsi) && Empty($kebutuhan)){
            $listpanti = DB::table('panti')->select()->where('provinsi', '=',  $provinsi)->get();
            return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
        } elseif(!Empty($provinsi) && !Empty('$kebutuhan')){
            $listpanti = DB::table('panti')->select()->where('kebutuhan_panti', '=',  $kebutuhan)->where('provinsi', $provinsi)->get();
            return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
        } else{
            $listpanti = DB::table('panti')->get();
            return view('listpanti')->with('listpanti', $listpanti)->with('provinces', $provinces);
        }

    }
    public function getKabupaten(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))->pluck('name', 'id');
    
        return response()->json($cities);
    }

}