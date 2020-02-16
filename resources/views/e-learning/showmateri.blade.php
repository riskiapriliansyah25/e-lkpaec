@extends('layouts/elearningmaster')
@section('title', $materi->judul)
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
                <h3>Materi Belajar</h3>
            </div>
            <ul class="list-group list-group-flush">
                <div class="card">
                <div class="card-body">
                    <span><a href="#">{{$materi->judul}}</a></span>
                    @if(isset($materi->materi))
                    <a href="{{asset('materi/'.$materi->materi)}}" download> <div class="badge badge-danger float-right">pdf</div></a>
                    @else
                    @endif
                    <p class="ml-2">
                            {!! $materi->deskripsi !!}
                    </p>
                    <small class="badge badge-primary">By: {{$materi->user->name}}</small>
                    <small class="badge badge-success">Kategori: {{$materi->buku->nama_buku}}</small>
                </div>
                </div>
            </ul>
        </div>
    </div>
</div>

<!-- end jumbotron -->
@endsection
