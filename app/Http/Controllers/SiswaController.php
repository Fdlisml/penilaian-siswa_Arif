<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        return view('siswa.index',[
            'siswa' => Siswa::all()
        ]);
    }

    public function create(){
        return view('siswa.create',[
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request){
        $data_siswa = $request->validate([
            'nis' => ['required', 'numeric'],
            'nama_siswa' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'kelas_id' => ['required'],
            'password' => ['required']
        ]);

        try{
            Siswa::create($data_siswa);
        }
        catch(\Throwable $th){
            return back()->with('error','Oppss!!! NIS Duplikat');
        }

        return redirect('/siswa/index')->with('success','Data Siswa Berhasil Ditambahkan');
    }

    public function edit(Siswa $siswa){
        return view('siswa.edit',[
            'siswa' => $siswa,
            'kelas' => Kelas::all()
        ]);        
    }

    public function update(Request $request, Siswa $siswa){
        $data_siswa = $request->validate([
            'nis' => ['required', 'numeric'],
            'nama_siswa' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'kelas_id' => ['required'],
            'password' => ['required']
        ]);

        try{
            $siswa->update($data_siswa);
        }
        catch(\Throwable $th){
            return back()->with('error','Oppss!!! NIS Duplikat');
        }

        return redirect('/siswa/index')->with('success','Data Siswa Berhasil Diubah');
    }

    public function destroy(Siswa $siswa){
        $nilai = Nilai::where('siswa_id', $siswa->id)->first();

        if ($nilai) {
            return back()->with('error',"Oppss! Data $siswa->nama_siswa Masih Digunakan Pada Tabel Nilai");
        }

        $siswa->delete();
        return redirect('/siswa/index')->with('success','Data Siswa Berhasil Dihapus');
    }
}
