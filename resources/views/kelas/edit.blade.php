@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>EDIT DATA KELAS</h2>
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%"><input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" id="">
                    </td>
                </tr>
                <tr>
                    <td width="25%">JURUSAN</td>
                    <td width="25%">
                        <select name="jurusan">
                            @if ($kelas->jurusan)
                                <option value="{{ $kelas->jurusan }}">{{ $kelas->jurusan }}</option>
                            @endif
                            <option value="MM">MM</option>
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="SIJA">SIJA</option>
                            <option value="DPIB">DPIB</option>
                            <option value="BKP">BKP</option>
                            <option value="TOI">TOI</option>
                            <option value="TKR">TKR</option>
                            <option value="TP">TP</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">ROMBEL</td>
                    <td width="25%">
                        <input type="text" name="rombel" id="" value="{{ $kelas->rombel }}">
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
