@extends('layouts.adminmaster')
@section('title', 'Edit Buku')
@section('content')
<!-- Page Heading -->
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i> Home</a></small></li>
        <li class="breadcrumb-item active"><small><a href="{{url('/buku')}}">Daftar Buku</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Edit Buku</small></li>
      </ol>
    </nav>
  </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{url('/buku/'.$buku->id)}}" method="post">
        @method('patch')
        @csrf
            <div class="form-group row">
                <label for="nama_buku" class="col-sm-2 col-form-label">Nama Buku</label>
                <div class="col-sm-6">
                    <input type="text" name="nama_buku" class="form-control" id="nama_buku" value="{{$buku->nama_buku}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 "></div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection