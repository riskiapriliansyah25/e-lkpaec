@extends('layouts.adminmaster') 
@section('title', $materi->judul)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<a href="{{asset('materi/'.$materi->materi)}}" download>{{$materi->materi}}</a><br>
<div class="badge badge-primary">{{$materi->user->name}}</div>
<div class="badge badge-success">{{$materi->buku->nama_buku}}</div>
<div class="row my-5">
    <div class="col-md">
        {!! $materi->deskripsi !!}
    </div>
</div>


@endsection


