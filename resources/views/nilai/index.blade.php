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
                        @if (session('role') == 'guru')
                            <th>ACTION</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-list">
                    @forelse ($nilai as $n)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $n->nama_guru }}</td>
                        <td>{{ $n->nama_siswa }}</td>
                        <td>{{ $n->nama_mapel }}</td>
                        <td>{{ $n->uh }}</td>
                        <td>{{ $n->uts }}</td>
                        <td>{{ $n->uas }}</td>
                        <td>{{ $n->na }}</td>
                        @if (session('role') == 'guru')
                            <td>
                                <a href="/nilai/edit/{{ $n->id }}" class="button-warning">EDIT</a>
                                <a href="/nilai/destroy/{{ $n->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="button-danger">HAPUS</a>
                            </td>
                        @endif
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
