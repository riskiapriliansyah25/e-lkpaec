@extends('layouts.adminmaster')
@section('title', $title)
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<form action="{{url('/paket/'.$paket->id)}}" method="post">
@method('patch')
@csrf
    <div class="form-group row">
        <label for="paket_id" class="col-sm-2 col-form-label">Paket ID</label>
        <div class="col-sm-6">
            <input type="text" name="paket_id" class="form-control" id="paket_id" value="{{$paket->paket_id}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_paket" class="col-sm-2 col-form-label">Nama Paket</label>
        <div class="col-sm-6">
            <input type="text" name="nama_paket" class="form-control" id="nama_paket" value="{{$paket->nama_paket}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="harga_paket" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-6">
            <input type="text" name="harga_paket" class="form-control" id="harga_paket" value="{{$paket->harga_paket}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 "></div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
    </div>
</form>
@endsection