@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<!-- Page Heading -->
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$coba->nama_kelas}}</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i> Home</a></small></li>
        <li class="breadcrumb-item active"><small><a href="{{url('/coba')}}">Daftar Kelas</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Detail</small></li>
      </ol>
    </nav>
  </div>
</div>



<div class="card">
  <div class="card-body">
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">NIS</th>
          <th scope="col">Nama Siswa</th>
          <th scope="col">Buku</th>
          <th scope="col">Instruktur</th>
        </tr>
      </thead>
      <tbody>
          @foreach($list_siswa as $siswa)
        <tr>
          <td>{{$siswa->nis}}</td>
          <td>{{$siswa->nama}}</td>
          <td>{{$siswa->buku->nama_buku}}</td>
          <td><a href="{{url('/instruktur/'.$coba->instruktur_id)}}">{{$coba->instruktur->nama}}</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>



@endsection


