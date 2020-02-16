@extends('layouts/elearningmaster')
@section('title', 'Ujian')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">@yield('title')</h1>
    </div>
</div>
<div class="container mb-5">
    <div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Soal Tes Penempatan
            </button>
        </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
        <div class="row">
                @if($pakets->count())
                @foreach($pakets as $paket)
                @if($paket->soal->jenis == 'tes')
                @php
                    $check =  App\Jawab::where('id_soal', $paket->id_soal)->where('id_user', Auth::user()->id)->first();
                @endphp
                @if($check)
                <div class="col-md-4 my-2">
                    <a href="{{url('/e-learning/ujian/finish/'.$paket->soal->id)}}">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soal->buku->nama_buku}}</div>
                                        @if($paket->soal->jenis == 'ujian')
                                        <div class="badge badge-primary">{{$paket->soal->jenis}}</div>
                                        @else
                                        <div class="badge badge-success">{{$paket->soal->jenis}}</div>
                                        @endif
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
                <div class="col-md-4 my-2">
                    <a href="{{url('/e-learning/ujian/detail/'.$paket->soal->id)}}">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soal->buku->nama_buku}}</div>
                                        @if($paket->soal->jenis == 'ujian')
                                        <div class="badge badge-primary">{{$paket->soal->jenis}}</div>
                                        @else
                                        <div class="badge badge-success">{{$paket->soal->jenis}}</div>
                                        @endif
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
                @endif
                @endforeach
                @else
                <div class="alert alert-primary" role="alert">
                    Belum ada soal yang bisa dikerjakan
                </div>
                @endif
            </div>
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Soal Ujian
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
        <div class="row">
                @if($pakets->count())
                @foreach($pakets as $paket)
                @if($paket->soal->jenis == 'ujian')
                @php
                    $check =  App\Jawab::where('id_soal', $paket->id_soal)->where('id_user', Auth::user()->id)->first();
                @endphp
                @if($check)
                <div class="col-md-4 my-2">
                    <a href="{{url('/e-learning/ujian/finish/'.$paket->soal->id)}}">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soal->buku->nama_buku}}</div>
                                        @if($paket->soal->jenis == 'ujian')
                                        <div class="badge badge-primary">{{$paket->soal->jenis}}</div>
                                        @else
                                        <div class="badge badge-success">{{$paket->soal->jenis}}</div>
                                        @endif
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
                <div class="col-md-4 my-2">
                    <a href="{{url('/e-learning/ujian/detail/'.$paket->soal->id)}}">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket->soal->buku->nama_buku}}</div>
                                        @if($paket->soal->jenis == 'ujian')
                                        <div class="badge badge-primary">{{$paket->soal->jenis}}</div>
                                        @else
                                        <div class="badge badge-success">{{$paket->soal->jenis}}</div>
                                        @endif
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
                @endif
                @endforeach
                @else
                <div class="alert alert-primary" role="alert">
                    Belum ada soal yang bisa dikerjakan
                </div>
                @endif
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- end jumbotron -->
@endsection
