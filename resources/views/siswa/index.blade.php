@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA SISWA</h2>
            <a href="/siswa/create" class="button-add">Tambah Data</a>
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
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>KELAS</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-list">
                    @forelse ($siswa as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ $s->kelas->nama_kelas }} {{ $s->kelas->jurusan }} {{ $s->kelas->rombel }}</td>
                            <td>{{ $s->password }}</td>
                            <td>
                                <a href="/siswa/edit/{{ $s->id }}" class="button-warning">EDIT</a>
                                <a href="/siswa/destroy/{{ $s->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            Data Belum Tersedia
                        </td>
                    </tr>
                    @endforelse
                    {{-- @foreach ($siswa as $s)
                    @endforeach --}}
                </tbody>
            </table>
        </b>
    </center>
@endsection
