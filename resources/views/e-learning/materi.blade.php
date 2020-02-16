@extends('layouts/elearningmaster')
@section('title', 'Materi')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">@yield('title')</h1>
    </div>
</div>
<div class="row justify-content-center my-5" id="login">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                @if(isset(Auth::user()->siswa->kelas_id))
                <h3>Materi Belajar <small>(dikelas {{Auth::user()->siswa->coba->nama_kelas}})</small></h3>
                @else
                <h3>Anda belum mendapatkan kelas</h3>
                @endif
            </div>
            <ul class="list-group list-group-flush">
                @if($list_distribusi->count())
                @foreach($list_distribusi as $distribusi)
                <div class="card">
                <div class="card-body">
                    <span><a href="{{url('e-learning/materi/'.$distribusi->materi->id)}}">{{$distribusi->materi->judul}}</a></span>&nbsp;<small>{{$distribusi->materi->created_at->diffForHumans()}}</small>
                    @if(isset($distribusi->materi->materi))
                    <a href="{{asset('materi/'.$distribusi->materi->materi)}}" download> <div class="badge badge-danger float-right">pdf</div></a>
                    @else
                    @endif
                    <p class="ml-2">
                            {!! str_limit($distribusi->materi->deskripsi, 100, '...') !!}
                    </p>
                    <small class="badge badge-primary">By: {{$distribusi->materi->user->name}}</small>
                    <small class="badge badge-success">Kategori: {{$distribusi->materi->buku->nama_buku}}</small>
                </div>
                </div>
                @endforeach
                @else
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        Belum ada materi dikelas anda
                    </div>
                </div>
                @endif
            </ul>
        </div>
    </div>
</div>

<!-- end jumbotron -->
@endsection
