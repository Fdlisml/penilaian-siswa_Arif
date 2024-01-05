<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use PDO;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function home(){
        return view('home');
    }

    public function loginAdmin(Request $request){
        $admin = Administrator::where('kode_admin', $request->kode_admin)->first();

        if(!$admin){
           return back()->with('error','Kode Admin atau Password Salah');
        }

        if($admin->password != $request->password){
            return back()->with('error','Kode Admin atau Password Salah');
        }

        session([
            'role' => 'admin',
            'kode_admin' => $admin->kode_admin
        ]);

        return redirect('/home');
    }

    public function loginSiswa(Request $request){
        $siswa = Siswa::where('nis', $request->nis)->first();

        if(!$siswa){
            return back()->with('error', 'NIS atau Password Salah');
        }

        if($siswa->password != $request->password){
            return back()->with('error', 'NIS atau Password Salah');
        }

        session([
            'role' => 'siswa',
            'nis' => $siswa->nis,
            'user' => $siswa->nama_siswa,
            'id' => $siswa->id
        ]);

        return redirect('/home');
    }

    public function loginGuru(Request $request){
        $guru = Guru::where('nip', $request->nip)->first();

        if(!$guru){
            return back()->with('error', 'NIP atau Password Salah');
        }

        if($guru->password != $request->password){
            return back()->with('error', 'NIP atau Password Salah');
        }

        session([
            'role' => 'guru',
            'nip' => $guru->nip,
            'user' => $guru->nama_guru,
            'id' => $guru->id,
        ]);

        return redirect('/home');

    }

    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect('/');
    }
}
