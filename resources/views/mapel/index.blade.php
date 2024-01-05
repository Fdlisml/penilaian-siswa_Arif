@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MAPEL</h2>
            <a href="/mapel/create" class="button-add">Tambah Data</a>
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
                        <th>MATA PELAJARAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-list">
                    @forelse ($mapel as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td>
                                <a href="/mapel/edit/{{ $m->id }}" class="button-warning">EDIT</a>
                                <a href="/mapel/destroy/{{ $m->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                Data Belum Tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </b>
    </center>
@endsection
