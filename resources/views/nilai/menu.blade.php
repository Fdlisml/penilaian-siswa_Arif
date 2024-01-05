@extends('layout.main')
@section('content')
    <section>
        <div class="content">
            @forelse ($mengajar as $m)
                <div class="menu-kelas">
                    <div class="kelas-list">
                        <a href="/nilai/kelas/{{ session('id')}}/{{ $m->kelas_id }}">{{ $m->kelas->nama_kelas }} {{ $m->kelas->jurusan }} {{ $m->kelas->rombel }}</a>
                    </div>
                </div>
            @empty
            <div class="menu-kelas">
                <div class="kelas-list">
                    Anda Belum Mendapatkan Kelas dan Mapel
                </div>
            </div>
            @endforelse
        </div>
    </section>
@endsection