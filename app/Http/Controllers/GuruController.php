<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create(){
        return view('guru.create');
    }

    public function store(Request $request){
        $data_guru = $request->validate([
            'nip' => ['required', 'numeric'],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);

        try{
            Guru::create($data_guru);
        }
        catch(\Throwable $th){
            return back()->with('error', 'Oppss!!! NIP Duplikat');
        }

        return redirect('/guru/index')->with('success', 'Data Guru Berhasil Ditambahkan');
    }

    public function edit(Guru $guru){
        return view('guru.edit',[
            'guru' => $guru
        ]);
    }

    public function update(Request $request, Guru $guru){
        $data_guru = $request->validate([
            'nip' => ['required', 'numeric'],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);

        try{
            $guru->update($data_guru);
        }
        catch(\Throwable $th){
            return back()->with('error','Oppss!!! NIP Duplikat');
        }

        return redirect('/guru/index')->with('success','Data Guru Berhasil Di Ubah');
    }

    public function destroy(Guru $guru){
        $mengajar = Mengajar::where('guru_id',$guru->id)->first();

        if($mengajar){
            return back()->with('error', "Data $guru->nama_guru Masih Digunakan Pada Tabel Mengajar");
        }
        else{
            $guru->delete();
            return redirect('/guru/index')->with('success','Data Gur Berhasil Dihapus');
        }

    }
}
