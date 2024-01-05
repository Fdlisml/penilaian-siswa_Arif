@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA KELAS</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/kelas/store" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%"><input type="text" name="nama_kelas" id=""></td>
                </tr>
                <tr>
                    <td width="25%">JURUSAN</td>
                    <td width="25%">
                        <select name="jurusan">
                            <option selected>Pilih Jurusan</option>
                            <option value="MM">MM</option>
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="SIJA">SIJA</option>
                            <option value="DPIB">DPIB</option>
                            <option value="BKP">BKP</option>
                            <option value="TOI">TOI</option>
                            <option value="TKR">TKR</option>
                            <option value="TP">TP</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">ROMBEL</td>
                    <td width="25%">
                        <input type="text" name="rombel" id="">
                    </td>
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
