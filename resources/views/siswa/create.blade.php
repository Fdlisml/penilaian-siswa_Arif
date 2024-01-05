@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA SISWA</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/siswa/store" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">NIS</td>
                    <td width="25%"><input type="text" class="" name="nis" id=""></td>
                </tr>
                <tr>
                    <td width="25%">NAMA SISWA</td>
                    <td width="25%"><input type="text" name="nama_siswa" id=""></td>
                </tr>
                <tr>
                    <td width="25%">JENIS KELAMIN</td>
                    <td width="25%">
                        <input type="radio" name="jk" value="L">Laki-laki
                        <input type="radio" name="jk" value="P">Perempuan
                    </td>
                </tr>
                <tr>
                    <td width="25%">ALAMAT</td>
                    <td width="25%">
                        <textarea name="alamat" id="" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%">
                        <select name="kelas_id" id="">
                            <option selected>Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">PASSWORD</td>
                    <td width="25%"><input type="password" name="password" id=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="button-add" type="submit">SIMPAN</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection
