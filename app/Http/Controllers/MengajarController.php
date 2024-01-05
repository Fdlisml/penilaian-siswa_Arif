<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\Nilai;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    public function index(){
        return view('mengajar.index',[
            'mengajar' => Mengajar::all()
        ]);
    }

    public function create(){
        return view('mengajar.create',[
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request){
        $data_mengajar = $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $mengajar = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
        if ($mengajar) {
            return back()->with('error','Oppss!!! Mapel dan Kelas Sudah Terisi');
        }

        Mengajar::create($data_mengajar);

        return redirect('/mengajar/index')->with('success','Data Mengajar Berhasil Ditambahkan');
    }

    public function edit(Mengajar $mengajar){
        return view('mengajar.edit',[
            'mengajar' => $mengajar,
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function update(Request $request, Mengajar $mengajar){
        $data_mengajar = $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        if ($request->guru_id != $mengajar->guru_id || $request->mapel_id != $mengajar->guru_id || $request->kelas_id != $mengajar->kelas_id) {     
            $check = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
            if ($check) {
                return back()->with('error','Oppss!!! Mapel dan Kelas Sudah Terisi');                
            }
        }
        $mengajar->update($data_mengajar);
        return redirect('/mengajar/index')->with('success','Data Mengajar Berhasil Diubah');        
    }

    public function destroy(Mengajar $mengajar){
        $nilai = Nilai::where('mengajar_id',$mengajar->id)->first();
        if ($nilai) {
            return back()->with('error',"Data Mengajar $mengajar->id Masih Digunakan Pada Tabel Nilai");
        }
        $mengajar->delete();
        return redirect('/mengajar/index')->with('success','Data Mengajar Berhasil Dihapus');        
    }
}
