@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA NILAI</h2>
            @if (session('role') == 'guru')
                <a href="/nilai/create/{{ session('id') }}/{{ $idKelas }}" class="button-add">Tambah Data</a>
            @endif

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
                        <th>GURU MAPEL</th>
                        <th>NAMA SISWA</th>
                        <td>MAPEL</td>
                        <th>UH</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>NA</th>
                    </tr>
                </thead>
                <tbody class="table-list">
                    @forelse ($nilai as $n)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $n->mengajar->guru->nama_guru }}</td>
                        <td>{{ $n->siswa->nama_siswa }}</td>
                        <td>{{ $n->mengajar->mapel->nama_mapel }}</td>
                        <td>{{ $n->uh }}</td>
                        <td>{{ $n->uts }}</td>
                        <td>{{ $n->uas }}</td>
                        <td>{{ $n->na }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="10">
                                Data Belum Tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </b>
    </center>
@endsection
