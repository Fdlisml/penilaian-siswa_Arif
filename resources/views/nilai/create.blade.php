@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA NILAI</h2>
        <form action="/nilai/store" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">GURU MAPEL</td>
                    <td width="25%">
                        <select name="mengajar_id" id="" style="width:250px; font-size:12px;">
                            @foreach ($mengajar as $m)
                                <option value="{{ $m->id }}">
                                    {{ session('user') }} - {{ $m->mapel->nama_mapel }} - {{ $m->kelas->nama_kelas }}
                                    {{ $m->kelas->jurusan }} {{ $m->kelas->rombel }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">SISWA</td>
                    <td width="25%">
                        <select name="siswa_id" style="width: 208px;">
                            <option selected>Pilih Siswa</option>
                            @forelse ($dataSiswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                            @empty
                                <option value="" disabled>Siswa Belum Tersedia</option>
                            @endforelse
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">UH</td>
                    <td width="25%">
                        <input type="number" name="uh" id="">
                    </td>
                </tr>
                <tr>
                    <td width="25%">UTS</td>
                    <td width="25%">
                        <input type="number" name="uts" id="">
                    </td>
                </tr>
                <tr>
                    <td width="25%">UAS</td>
                    <td width="25%">
                        <input type="number" name="uas" id="">
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
