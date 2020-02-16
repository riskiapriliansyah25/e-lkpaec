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
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <title>Hasil</title>
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-green fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Active English Course</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="{{url('/e-learning')}}">Home</a>
                <a class="nav-item nav-link" href="{{url('/e-learning/latihan')}}">Latihan</a>
            </div>
        </div>
    </div>
</nav>
<!-- end navbar -->

<!-- main -->
<div class="container">
    <div class="row tinggi-card">
           <table class="table table-striped">
               <tr>
                   <td width="150">Nama</td>
                   <td width="30">:</td>
                   <td>{{Auth::user()->name}}</td>
               </tr>
               <tr>
                   <td width="150">Kelas</td>
                   <td width="30">:</td>
                   <td>{{Auth::user()->siswa->coba->nama_kelas}}</td>
               </tr>
               <tr>
                   <td width="150">Paket Soal</td>
                   <td width="30">:</td>
                   <td>{{$soal->buku->nama_buku}}: {{$soal->materi->judul}}</td>
               </tr>
               <tr>
                   <td width="150">Jumlah Soal</td>
                   <td width="30">:</td>
                   <td>{{$soal->detailsoallatihan->count()}}</td>
               </tr>
               <tr>
                   <td width="150">Jawaban Benar</td>
                   <td width="30">:</td>
                   <td>{{$jawaban_benar->count()}} / {{$soal->detailsoallatihan->count()}}</td>
               </tr>

               <tr>
                   <td width="50">Nilai</td>
                   <td width="30">:</td>
                   <td>{{$nilai}}</td>
               </tr>
           </table>
           <div class="card">
               <div class="card-body">
                @foreach($jawaban as $jawab)
                       <span class="badge badge-primary">No.{{$loop->iteration}}</span>
                       {!! $jawab->detailsoallatihan->soal !!}
                       <h5><span class="badge @if($jawab->pilihan == 'A') badge-secondary @endif">A. {!! $jawab->detailsoallatihan->pila !!}</span></h5>
                       <h5><span class="badge @if($jawab->pilihan == 'B') badge-secondary @endif">B. {!! $jawab->detailsoallatihan->pilb !!}</span></h5>
                       <h5><span class="badge @if($jawab->pilihan == 'C') badge-secondary @endif">C. {!! $jawab->detailsoallatihan->pilc !!}</span></h5>
                       <h5><span class="badge @if($jawab->pilihan == 'D') badge-secondary @endif">D. {!! $jawab->detailsoallatihan->pild !!}</span></h5>
                       <h5>Jawaban Benar: <span class="badge badge-success">{{$jawab->detailsoallatihan->kunci}}</span></h5>
                       <p>Penjelasan: {!! $jawab->detailsoallatihan->penjelasan !!}</p>

                @endforeach

               </div>
           </div>
          
    </div>
</div>
<!-- endmain -->


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
</body>

</html>