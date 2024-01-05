@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA KELAS</h2>
            <a href="/kelas/create" class="button-add">Tambah Data</a>
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif

            <table cellpadding="10" class="table">
                <thead class="table-dark">
                    <tr>
                        <th>NO</th>
                        <th>NAMA KELAS</th>
                        <th>JURUSAN</th>
                        <th>ROMBEL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-list">
                    @forelse ($kelas as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>{{ $k->jurusan }}</td>
                            <td>{{ $k->rombel }}</td>
                            <td>
                                <a href="/kelas/edit/{{ $k->id }}" class="button-warning">Edit</a>
                                <a href="/kelas/destroy/{{ $k->id }}" class="button-danger"
                                    onclick="confirm('Anda Akan Menghapus Data Ini?')">Delete</a>
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
