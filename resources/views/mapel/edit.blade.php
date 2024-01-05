@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>EDIT DATA MAPEL</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/mapel/update/{{ $mapel->id }}" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">MATA PELAJARAN</td>
                    <td width="25%"><input type="text" name="nama_mapel" value="{{ $mapel->nama_mapel }}"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="button-add" type="submit">UBAH</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection
