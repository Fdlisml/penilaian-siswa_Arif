@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA MAPEL</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/mapel/store" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">MATA PELAJARAN</td>
                    <td width="25%"><input type="text" name="nama_mapel"></td>
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
