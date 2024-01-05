<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Penilaian Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="header">
        <img src="{{ asset('img/header.jpg') }}" height="40%" width="100%" alt="">
    </div>

    <div class="menu">
        <a href="/home" class="">HOME</a>
        @if (session('role') == 'admin')
            <a href="/guru/index">GURU</a>
            <a href="/kelas/index">KELAS</a>
            <a href="/siswa/index">SISWA</a>
            <a href="/mapel/index">MAPEL</a>
            <a href="/mengajar/index">MENGAJAR</a>
            <a href="/logout">LOGOUT</a>
        @elseif(session('role') == 'siswa' || session('role') == 'guru')
            <a href="/nilai/index">NILAI</a>
            <a href="/logout">LOGOUT</a>
        @endif
    </div>

    @yield('content')

    <div class="footer">
        <center>
            <p>
                &copy; {{ date('Y') }} - LSP & UJIKOM @arifhidayat05_
            </p>
        </center>
    </div>

    <script src="./js/script.js"></script>
</body>

</html>
