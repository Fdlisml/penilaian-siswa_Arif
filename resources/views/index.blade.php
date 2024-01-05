@extends('layout.main')
@section('content')
    <div class="kiri-atas">
        <fieldset>
            <center>
                <button onclick="handleFormAdmin()" class="button-primary">Admin</button>
                <button onclick="handleFormSiswa()" class="button-primary">Siswa</button>
                <button onclick="handleFormGuru()" class="button-primary">Guru</button>
                <hr />
                <p>Silahkan Login Sesuai User</p>
                <hr />
            </center>

            {{-- Form Admin --}}
            <div class="formAdmin" id="formAdmin">
                <center>
                    <b>Login Admin</b>
                    <p>{{ session('error') }}</p>
                </center>
                <form action="/loginAdmin" method="post" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%">
                                Kode Admin
                            </td>
                            <td width="25%">
                                <input type="text" name="kode_admin" />
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">
                                Password
                            </td>
                            <td width="25%">
                                <input type="password" name="password" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="button-login">
                                    Login
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            {{-- Form Siswa --}}
            <div class="formSiswa" id="formSiswa">
                <center>
                    <b>Login Siswa</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/loginSiswa" method="post" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%">
                                NIS
                            </td>
                            <td width="25%">
                                <input type="text" name="nis" />
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">
                                Password
                            </td>
                            <td width="25%">
                                <input type="password" name="password" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="button-login">
                                    Login
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            {{-- Form Guru --}}
            <div class="formGuru" id="formGuru">
                <center>
                    <b>Login Guru</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/loginGuru" method="post" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%">
                                NIP
                            </td>
                            <td width="25%">
                                <input type="text" name="nip"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">
                                Password
                            </td>
                            <td width="25%">
                                <input type="password" name="password"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="button-login">
                                    Login
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </fieldset>
    </div>

    <div class="kanan">
        <center>
            <h1>
                SELAMAT DATANG
                <br>
                Di Website Penilaian SMK Negeri 1 Cibinong
            </h1>
        </center>
    </div>

    <div class="kiri-bawah">
        <center>
            <b>
                <p class="mar">Gallery</p>
                <div class="gallery">
                    <img src={{ asset('img/g2.jpg') }} alt="" />
                    <div class="deskripsi">SMK BISA {{ date('Y') }}</div>
                </div>
            </b>
        </center>
    </div>
@endsection
