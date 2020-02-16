@extends('layouts.adminmaster')
@section('title', 'Edit Kelas')
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
        <li class="breadcrumb-item active" aria-current="page"><small>Edit</small></li>
      </ol>
    </nav>
  </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{url('/coba/'.$coba->id)}}" method="post">
        @method('patch')
        @csrf
            <div class="form-group row">
                <label for="nama_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                <div class="col-sm-6">
                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="{{$coba->nama_kelas}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="instruktur_id" class="col-sm-2 col-form-label">Instruktur</label>
                <div class="col-sm-6">
                    <select name="instruktur_id" id="instruktur_id" class="form-control">
                        @foreach($list_instruktur as $instruktur)
                        <option value="{{$instruktur->id}}" @if($instruktur->id == $coba->instruktur_id) selected @endif>{{$instruktur->nama}}</option>
                        @endforeach
                    </select>
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