@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MENGAJAR</h2>
            <a href="/mengajar/create" class="button-add">Tambah Data</a>
            @if (session('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>NO</th>
                        <th>GURU</th>
                        <th>MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-list">
                    @forelse ($mengajar as $meng)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $meng->guru->nama_guru }}</td>
                            <td>{{ $meng->mapel->nama_mapel }}</td>
                            <td>{{ $meng->kelas->nama_kelas }} {{ $meng->kelas->jurusan }} {{ $meng->kelas->rombel }}</td>
                            <td>
                                <a href="/mengajar/edit/{{ $meng->id }}" class="button-warning">EDIT</a>
                                <a href="/mengajar/destroy/{{ $meng->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            Data Belum Tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </b>
    </center>
@endsection
