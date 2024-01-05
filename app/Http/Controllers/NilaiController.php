<?php

namespace App\Http\Controllers;

use App\Models\Kelas;   
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index(){
        if (session('role') == 'guru') {
            $mengajar = Mengajar::where('guru_id', session('id'))->get();
            return view('nilai.menu',[
                'mengajar' => $mengajar
            ]);
        }
        else{
            $nilai = Nilai::where('siswa_id', session('id'))->get();
            return view('nilai.nilai_siswa', [
                'nilai' => $nilai
            ]);
        }
    }

    public function kelas($idGuru, $idKelas){
        $dataNilai = DB::table('nilai')->join('mengajar', 'nilai.mengajar_id','=','mengajar.id')->join('siswa','nilai.siswa_id','=','siswa.id')->join('guru','mengajar.guru_id','=','guru.id')->join('kelas','mengajar.kelas_id','=','kelas.id')->join('mapel','mengajar.mapel_id','=','mapel.id')->select('nilai.*','siswa.nama_siswa AS nama_siswa','guru.nama_guru AS nama_guru','kelas.nama_kelas AS nama_kelas','mapel.nama_mapel AS nama_mapel')->where('guru.id', $idGuru)->where('kelas.id', $idKelas)->get();
        
        return view('nilai.index',[
            'nilai' => $dataNilai,
            'idKelas' => $idKelas
        ]);
    }

    public function create($idGuru, $idKelas){
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id',$idKelas)->get();
        $dataSiswa = DB::table('siswa')->join('mengajar','siswa.kelas_id','=','mengajar.kelas_id')->where('siswa.kelas_id', $idKelas)->select('siswa.id','siswa.nama_siswa')->get();
        session(['idGuru' => $idGuru, 'idKelas' => $idKelas]);
        return view('nilai.create',compact(['idKelas','dataSiswa','mengajar']));
    }

    public function store(Request $request){
        $dataNilai = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required', 'numeric'],
            'uts' => ['required', 'numeric'],
            'uas' => ['required', 'numeric']
        ]);

        $idKelas = Mengajar::where('id',$request->mengajar_id)->value('kelas_id');
        $idGuru = session('id');

        $dataNilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        Nilai::create($dataNilai);

        return redirect("/nilai/kelas/$idGuru/$idKelas")->with('success','Data Nilai Berhasil Ditambahkan');
    }

    public function edit(Nilai $nilai){
        $idKelas = Mengajar::where('id',$nilai->id)->value('kelas_id');
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id',$idKelas)->get();
        $dataSiswa = DB::table('siswa')->join('mengajar','siswa.kelas_id','=','mengajar.kelas_id')->where('siswa.kelas_id', $idKelas)->select('siswa.id','siswa.nama_siswa')->get();
        return view('nilai.edit', [
            'nilai' => $nilai,
            'mengajar' => $mengajar,
            'siswa' => $dataSiswa
        ]);
    }

    public function update(Request $request, Nilai $nilai){
        $data_nilai = $request->validate([
            'uh' => 'required',
            'uts' => 'required',
            'uas' => 'required'
        ]);

        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        $nilai->update($data_nilai);

        $idGuru = session('id');
        $idKelas = Mengajar::where('id', $nilai->mengajar_id)->value('kelas_id');
        return redirect("/nilai/kelas/$idGuru/$idKelas")->with('success','Data Nilai Berhasil Diubah');
    }

    public function destroy(Nilai $nilai)
    {
        $idGuru = session('id');
        $idKelas = Mengajar::where('id', $nilai->mengajar_id)->value('kelas_id');
        $nilai->delete();
        return redirect("/nilai/kelas/$idGuru/$idKelas")->with('success','Data Nilai Berhasil Dihapus');
    }
}
