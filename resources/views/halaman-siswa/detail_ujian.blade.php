<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS Style -->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/elearningstyle.css')}}">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <title>Detail soal</title>
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-green">
    <div class="container">
        <a class="navbar-brand" href="#">E-Learning AEC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                @if(!empty($halaman) && $halaman == 'home')
                <a class="nav-item nav-link active" href="{{url('/e-learning')}}">Home</a>
                @else
                <a class="nav-item nav-link" href="{{url('/e-learning')}}">Home</a>
                @endif
                @if(Auth::check())
                <a class="nav-item nav-link" href="{{url('/e-learning/materi')}}">Materi</a>
                <a class="nav-item nav-link" href="{{url('/e-learning/latihan')}}">Tugas/Latihan</a>
                <a class="nav-item nav-link" href="{{url('/nilai')}}">Nilai</a>
                @endif
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="{{url('/_logout')}}">Logout</a>
                    </div>
                </li>
                @else
                <a class="nav-item nav-link" href="#login">Login</a>
                @endif

            </div>
        </div>
    </div>
</nav>
<!-- end navbar -->

<div class="container">
    <div class="card my-5" style="border: 1px solid black;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">Materi</div>
                <div class="col-md-10">: {{$soal->materi->judul}}</div>
            </div>
            <div class="row">
                <div class="col-md-2">Buku</div>
                <div class="col-md-10">: {{$soal->materi->buku->nama_buku}}</div>
            </div>
            <div class="row">
                <div class="col-md-2">Jumlah Soal</div>
                <div class="col-md-10">: {{$soal->detailsoal->count()}}</div>
            </div>
            <div class="row">
                <div class="col-md-2">Waktu</div>
                <div class="col-md-10">: {{$soal->waktu.' menit'}}</div>
            </div>
            <div class="row">
                <div class="col-md">
                <button class="btn btn-primary btn-lg btn-block my-3" id="start-exam" onclick="$('#specialstuff').fullScreen(true)">Mulai Mengerjakan Soal!</button>
                </div>
            </div>
        </div>
    </div>

    <div style="padding:  10px; border: double #fff 15px; color: #fff; background: #b90000;">
        <p style="font-weight: bold;">Silahkan kerjakan soal yang telah di siapkan. Harap dipatuhi peraturan berikut!</p>
        <ul>
            <li>Jangan mereload/refresh browser (jawaban akan hilang)</li>
            <li>Jangan menekan tombol selesai saat mengerjakan soal, kecuali saat anda telah selesai mengerjakan seluruh soal</li>
            <li>Perhatikan sisa waktu ujian, sistem akan mengumpulkan jawaban saat waktu sudah selesai</li>
            <li>Waktu ujian akan dimulai saat tombol "<b>Mulai Mengerjakan Soal!</b>" di klik</li>
        </ul>
    </div>
</div>

<div class="container my-5">
</div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
      <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>