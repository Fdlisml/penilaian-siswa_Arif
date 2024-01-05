@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>EDIT DATA MENGAJAR</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/mengajar/update/{{ $mengajar->id }}" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">GURU</td>
                    <td width="25%">
                        <select name="guru_id">
                            @foreach ($guru as $g)
                                @if ($mengajar->guru_id == $g->id)
                                    <option value="{{ $g->id }}" selected>{{ $g->nama_guru }}</option>
                                @else
                                    <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">MATA PELAJARAN</td>
                    <td width="25%">
                        <select name="mapel_id">
                            @foreach ($mapel as $m)
                                @if ($mengajar->mapel_id == $m->id)
                                    <option value="{{ $m->id }}" selected>{{ $m->nama_mapel }}</option>
                                @else
                                    <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%">
                        <select name="kelas_id">
                            @foreach ($kelas as $k)
                                @if ($mengajar->kelas_id == $k->id)
                                    <option value="{{ $k->id }}" selected>{{ $k->nama_kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                                @else
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="button-add" type="submit">UBAH</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection
