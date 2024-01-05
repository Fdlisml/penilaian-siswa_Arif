@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>EDIT DATA GURU</h2>
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
             {{-- nip nama_guru jk alamat password --}}
            <form action="/guru/update/{{ $guru->id }}" method="POST">
                @csrf
                <table width="50%">
                    <tr>
                        <td width="25%">NIP</td>
                        <td width="25%">
                            <input type="number" name="nip" value="{{ $guru->nip }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">NAMA GURU</td>
                        <td width="25%">
                          <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">JENIS KELAMIN</td>
                        <td width="25%">
                            <input type="radio" name="jk" id="" value="L" {{ $guru->jk == 'L' ? 'checked' : '' }}>Laki-laki
                            <input type="radio" name="jk" id="" value="P" {{ $guru->jk == 'P' ? 'checked' : '' }}>Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">ALAMAT</td>
                        <td width="25%">
                          <textarea name="alamat" id="" cols="30" rows="5">{{ $guru->alamat }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">PASSWORD</td>
                        <td width="25%">
                          <input type="text" name="password" value="{{ $guru->password }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                                <button class="button-add">Update</button>
                            </center>
                        </td>
                    </tr>
                </table>
            </form>
        </b>
    </center>
@endsection