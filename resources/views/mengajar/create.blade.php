@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA MENGAJAR</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/mengajar/store" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">GURU</td>
                    <td width="25%">
                        <select name="guru_id">
                            <option selected>Pilih Guru</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">MATA PELAJARAN</td>
                    <td width="25%">
                        <select name="mapel_id">
                            <option selected>Pilih Mapel</option>
                            @foreach ($mapel as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%">
                        <select name="kelas_id">
                            <option selected>Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                            @endforeach
                        </select>
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
