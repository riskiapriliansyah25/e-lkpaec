@extends('layouts/elearningmaster')
@section('title', 'Latihan')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">@yield('title')</h1>
    </div>
</div>

<div class="container mb-5">
    <div class="card">
        <div class="card-header">
            @if(isset(Auth::user()->siswa->kelas_id))
            <h4>Soal Latihan (di Kelas {{Auth::user()->siswa->coba->nama_kelas}})</h4>
            @else
            <h4>Soal Latihan (di Kelas -)</h4>
            @endif
        </div>
        <div class="card-body">
            <div class="row">
                @if($pakets->count())
                @foreach($pakets as $paket)
                @php
                    $check =  App\Jawablatihan::where('id_soal', $paket->id_soal)->where('id_user', Auth::user()->id)->first();
                @endphp
                @if($check)
                <div class="col-md-4">
                    <a href="{{url('/e-learning/latihan/finish/'.$paket->soallatihan->id)}}">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soallatihan->buku->nama_buku}}</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soallatihan->materi->judul}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-check-circle fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="col-md-4">
                    <a href="{{url('/e-learning/latihan/detail/'.$paket->soallatihan->id)}}">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soallatihan->buku->nama_buku}}</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soallatihan->materi->judul}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
                @else
                <div class="alert alert-primary" role="alert">
                    Tidak ada soal tersedia
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


<!-- end jumbotron -->
@endsection
