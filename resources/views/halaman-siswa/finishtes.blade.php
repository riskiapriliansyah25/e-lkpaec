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
                <a class="nav-item nav-link" href="{{url('/e-learning/ujian')}}">Ujian</a>
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
                   <td width="150">Paket Soal</td>
                   <td width="30">:</td>
                   <td>{{$soall->buku->nama_buku}}</td>
               </tr>
               <tr>
                   <td width="150">Jenis</td>
                   <td width="30">:</td>
                   @if($soall->jenis == 'tes')
                   <td>Tes Penempatan</td>
                   @else
                   <td>Tes Penempatan</td>
                   @endif
               </tr>
               <tr>
                   <td width="150">Jawaban Benar</td>
                   <td width="30">:</td>
                   <td>{{$jawaban_benar->count()}} / {{$soall->detailsoal->count()}}</td>
               </tr>
               <tr>
                   <td width="150">Nilai</td>
                   <td width="30">:</td>
                   <td>{{$nilai}}</td>
               </tr>
               <tr>
                   <td width="150">Keterangan</td>
                   <td width="30">:</td>
                   @if($nilai >= 70)
                   <td>Lanjut Level</td>
                   @else
                   <td>Selesai</td>
                   @endif
               </tr>
           </table>
           <div class="card">
               <div class="card-body">
                @foreach($jawaban as $jawab)
                       <span class="badge badge-primary">No.{{$loop->iteration}}</span>
                       {!! $jawab->detailsoal->soal !!}
                       <h5><span class="badge @if($jawab->pilihan == 'A') badge-secondary @endif">A. {!! $jawab->detailsoal->pila !!}</span></h5>
                       <h5><span class="badge @if($jawab->pilihan == 'B') badge-secondary @endif">B. {!! $jawab->detailsoal->pilb !!}</span></h5>
                       <h5><span class="badge @if($jawab->pilihan == 'C') badge-secondary @endif">C. {!! $jawab->detailsoal->pilc !!}</span></h5>
                       <h5><span class="badge @if($jawab->pilihan == 'D') badge-secondary @endif">D. {!! $jawab->detailsoal->pild !!}</span></h5>
                       <h5>Jawaban Benar: <span class="badge badge-success">{{$jawab->detailsoal->kunci}}</span></h5>
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