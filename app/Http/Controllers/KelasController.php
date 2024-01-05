<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(){
        return view('kelas.index',[
            'kelas' => Kelas::all()
        ]);
    }

    public function create(){
        return view('kelas.create');
    }

    public function store(Request $request){
        $data_kelas = $request->validate([
            'nama_kelas' => 'required',
            'jurusan' => 'required',
            'rombel' => 'required'
        ]);

        $cek_kelas = Kelas::where('nama_kelas', $request->nama_kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->rombel)->first();

        if($cek_kelas){
            return back()->with('error', 'Oppss!!! Data Kelas Sudah Tersedia');
        }

        Kelas::create($data_kelas);
        return redirect('/kelas/index')->with('success','Data Kelas Berhasil Ditambahkan');
    }

    public function edit(Kelas $kelas){
        return view('kelas.edit',[
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, Kelas $kelas){
        $data_kelas = $request->validate([
            'nama_kelas' => 'required',
            'jurusan' => 'required',
            'rombel' => 'required'
        ]);

        $cek_kelas = Kelas::where('nama_kelas', $request->nama_kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->rombel)->first();

        if($cek_kelas){
            return back()->with('error', 'Oppss!!! Data Kelas Sudah Tersedia');
        }

        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil Di Ubah');
    }

    public function destroy(Kelas $kelas){
        $siswa = Siswa::where('kelas_id',$kelas->id)->first();

        if($siswa){
            return back()->with('error', "Data $kelas->nama_kelas $kelas->jurusan $kelas->rombel Masih Digunakan Pada Tabel Siswa");
        }

        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();

        if($mengajar){
            return back()->with('error', "Data $kelas->nama_kelas $kelas->jurusan $kelas->rombel Masih Digunakan Pada Tabel Mengajar");
        }

        $kelas->delete();

        return redirect('/kelas/index')->with('success','Data Kelas Berhasil Dihapus');
    }
}
