@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA GURU</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/guru/store" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">NIP</td>
                    <td width="25%"><input type="text" class="" name="nip" id=""></td>
                </tr>
                <tr>
                    <td width="25%">NAMA GURU</td>
                    <td width="25%"><input type="text" name="nama_guru" id=""></td>
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
                    <td width="25%">PASSWORD</td>
                    <td width="25%"><input type="text" name="password" id=""></td>
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
