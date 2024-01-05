@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>EDIT DATA NILAI</h2>
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
            {{-- nip nama_mengajar jk alamat password --}}
            <form action="/nilai/update/{{ $nilai->id }}" method="POST">
                @csrf
                <table width="50%">
                    <tr>
                        <td width="25%">NAMA GURU - MAPEL</td>
                        <td width="25%">
                            <input type="text" name="siswa_id" id="" value="{{ $nilai->mengajar->guru->nama_guru }} - {{ $nilai->mengajar->mapel->nama_mapel }} - {{ $nilai->mengajar->kelas->nama_kelas }} {{ $nilai->mengajar->kelas->jurusan }} {{ $nilai->mengajar->kelas->rombel }}" disabled style="width: 250px">
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">SISWA</td>
                        <td width="25%">
                          <input type="text" name="siswa_id" id="" value="{{ $nilai->siswa->nama_siswa }}" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">UH</td>
                        <td width="25%">
                            <input type="number" name="uh" id="" value="{{ $nilai->uh }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">UTS</td>
                        <td width="25%">
                            <input type="number" name="uts" id="" value="{{ $nilai->uts }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">UAS</td>
                        <td width="25%">
                            <input type="number" name="uas" id="" value="{{ $nilai->uas }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                                <button class="button-primary">Update</button>
                            </center>
                        </td>
                    </tr>
                </table>
            </form>
        </b>
    </center>
@endsection