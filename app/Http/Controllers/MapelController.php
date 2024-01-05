<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(){
        return view('mapel.index',[
            'mapel' => Mapel::all()
        ]);
    }

    public function create(){
        return view('mapel.create');
    }

    public function store(Request $request){
        $data_mapel = $request->validate([
            'nama_mapel' => 'required'
        ]);

        try {
            Mapel::create($data_mapel);
        } catch (\Throwable $th) {
            return back()->with('error','Oppss!!! Mapel Duplikat');
        }

        return redirect('/mapel/index')->with('success','Data Mapel Berhasil Ditambahkan');
    }

    public function edit(Mapel $mapel){
        return view('mapel.edit',[
            'mapel' => $mapel
        ]);
    }

    public function update(Request $request, Mapel $mapel){
        $data_mapel = $request->validate([
            'nama_mapel' => 'required'
        ]);

        try {
            $mapel->update($data_mapel);
        } catch (\Throwable $th) {
            return back()->with('error','Oppss!!! Mapel Duplikat');
        }

        return redirect('/mapel/index')->with('success','Data Mapel Berhasil Diubah');
    }

    public function destroy(Mapel $mapel){
        $mengajar = Mengajar::where('mapel_id', $mapel->id)->first();

        if ($mengajar) {
            return back()->with('error','Oppss!!! Mapel Duplikat');
        }

        $mapel->delete();
        return redirect('/mapel/index')->with('success','Data Mapel Berhasil Dihapus');
    }

}
