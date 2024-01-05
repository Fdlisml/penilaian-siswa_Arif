@extends('layout.main')
@section('content')
    <center>
        <div class="home">
            <h1>Selamat Datang {{ session('role') }},
                @if (session('role') == 'guru')
                    {{ session('user') }}
                @elseif (session('role') == 'siswa')
                    {{ session('user') }}
                @else
                    {{ session('kode_admin') }}
                @endif
            </h1>
        </div>
    </center>
@endsection
