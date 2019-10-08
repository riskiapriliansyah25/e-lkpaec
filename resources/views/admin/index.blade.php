@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<div class="row">
    <div class="col-md-3">
     <!-- pendaftar -->
        <div class="card" style="width: 14rem;">
        <div class="card-body">
            <p class="card-text"><h5><a href="{{url('/pendaftar')}}">Pendaftar Baru</a>: {{$jumlah_pendaftar}} </h5> </p>
        </div>
        </div>   
    </div>
    <div class="col-md-3">
        <!-- Siswa -->
        <div class="card" style="width: 14rem;">
        
        <div class="card-body">
            <p class="card-text"><h5><a href="{{url('/siswa')}}">Siswa</a>: {{$jumlah_siswa}} </h5> </p>
        </div>
        </div>  
    </div>
    <div class="col-md-3">
        <!-- Instruktur -->
        <div class="card" style="width: 14rem;">
        <div class="card-body">
            <p class="card-text"><h5><a href="{{url('/instruktur')}}">Instruktur</a>: {{$jumlah_instruktur}} </h5> </p>
        </div>
        </div>  
    </div>
    <div class="col-md-3">
        <!-- Paket -->
        <div class="card" style="width: 14rem;">
        <div class="card-body">
            <p class="card-text"><h5><a href="{{url('/paket')}}">Paket Belajar</a> : {{$jumlah_paket}} </h5> </p>
        </div>
        </div>  
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-3">
      <!-- Buku -->
      <div class="card" style="width: 14rem;">
        <div class="card-body">
            <p class="card-text"><h5><a href="{{url('/buku')}}">Buku</a> : {{$jumlah_buku}} </h5> </p>
        </div>
        </div>   
    </div>
    <div class="col-md-3">
      <!-- Kelas -->
      <div class="card" style="width: 14rem;">
        <div class="card-body">
            <p class="card-text"><h5><a href="{{url('/coba')}}">Kelas</a> : {{$jumlah_kelas}} </h5> </p>
        </div>
        </div>   
    </div>
</div>



@endsection


