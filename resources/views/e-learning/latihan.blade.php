@extends('layouts/elearningmaster')
@section('title', 'Latihan')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Learning english <span>faster</span> <br> and <span>better</span> with us</h1>
    </div>
</div>
<div class="row justify-content-center my-5" id="login">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Latihan</h3>
            </div>
            <ul class="list-group list-group-flush">
                @if($distribusisoal->count())
                @foreach($distribusisoal as $soal)
                <div class="card-body">
                    <span>{{$soal->soal->materi->judul}}</span>
                    <p class="ml-2">
                    <a href="{{url('/e-learning/latihan/detail/'.$soal->id)}}" class="btn btn-primary my-2">Kerjakan</a>
                    </p>
                </div>
                @endforeach
                @else
                Belum ada soal yang bisa dikerjakan
                @endif
            </ul>
        </div>
    </div>
</div>

<!-- end jumbotron -->
@endsection
