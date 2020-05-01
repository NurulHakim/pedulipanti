<?php

namespace App\Http\Controllers;
use App\Panti;
use Illuminate\Support\Facades\DB;
// use App\galeri;
use Post;
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
        // $panti = DB::table('panti')->where('id', '=', $id)->get();
        // foreach($panti as $panti){
        //     $email = $panti->email_user;
        // }
        // $galeri = DB::table('galeris')->where('email_user', '=', $email)->get();

        $galeri = DB::table('galeris')->where('id_panti', '=', $id)->get();
        
        return view('/galerypanti')->with('galeri', $galeri);
    }

    public function searchPanti(Request $request){
        $search = $request->get('query');
        $searchloc = $request->get('lokasi');
        // $hasil = Post::where('nama_panti', 'LIKE', '%' . $search . '%')->paginate(10);
        if(Empty($search) && Empty($searchloc)){
            $hasil = DB::table('panti')->get();
            // return view('hasil', compact('search', 'searchloc', 'hasil'));
            return view('hasil')->with('hasil', $hasil);
            // echo("a");
        }else if(!Empty($search) && Empty($searchloc)){
            $hasil = DB::table('panti')->select()->where('nama_panti', 'LIKE', '%' . $search . '%')->orwhere('deskripsi_panti', 'LIKE', '%' . $search . '%')->orwhere('kebutuhan_panti', 'LIKE', '%' . $search . '%')->get();
            // return view('hasil', compact('search', 'hasil'));
            return view('hasil')->with('hasil', $hasil);
            // echo("b");
        }else if(Empty($search) && !Empty($searchloc)){
            $hasil = DB::table('panti')->select()->where('kecamatan', $searchloc)->get();
            // return view('hasil', \compact('searchloc', 'hasil'));
            return view('hasil')->with('hasil', $hasil);
            // echo("c");
        }else{
            $hasil = DB::table('panti')->select()->where('nama_panti', 'LIKE', '%' . $search . '%')->orwhere('deskripsi_panti', 'LIKE', '%' . $search . '%')->orwhere('kebutuhan_panti', 'LIKE', '%' . $search . '%')->where('kecamatan', $searchloc)->get();
            // return view('hasil', compact('search', 'searchloc', 'hasil'));
            return view('hasil')->with('hasil', $hasil);
            // echo("d");
        }

    }
}