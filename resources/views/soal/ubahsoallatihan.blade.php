@extends('layouts.adminmaster')
@section('title', 'Edit Soal')
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
        <li class="breadcrumb-item active"><small><a href="{{url('/soal-latihan')}}">Soal Latihan</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Edit</small></li>
      </ol>
    </nav>
  </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{url('/soal-latihan/ubah/'.$soallatihan->id)}}" method="post">
        @method('patch')
        @csrf
            <div class="form-group row">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis Soal</label>
                <div class="col-sm-6">
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="latihan">Latihan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="buku_id" class="col-sm-2 col-form-label">Buku</label>
                <div class="col-sm-6">
                    <select name="buku_id" id="buku_id" class="form-control">
                        @foreach($list_buku as $buku)
                        <option value="{{$buku->id}}" @if($buku->id == $soallatihan->buku_id) selected @endif>{{$buku->nama_buku}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="materi_id" class="col-sm-2 col-form-label">Materi</label>
                <div class="col-sm-6">
                    <select name="materi_id" id="materi_id" class="form-control">
                        @foreach($list_materi as $materi)
                        <option value="{{$materi->id}}" @if($materi->id == $soallatihan->materi_id) selected @endif>{{$materi->judul}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu Soal</label>
                <div class="col-sm-6">
                    <input type="text" name="waktu" class="form-control" value="{{$soallatihan->waktu}}">
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