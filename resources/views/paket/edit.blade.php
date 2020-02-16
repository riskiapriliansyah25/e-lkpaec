@extends('layouts.adminmaster')
@section('title', 'edit paket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<form action="{{url('/paket/'.$paket->id)}}" method="post">
@method('patch')
@csrf
    <div class="form-group row">
        <label for="nama_paket" class="col-sm-2 col-form-label">Nama Paket</label>
        <div class="col-sm-6">
            <input type="text" name="nama_paket" class="form-control" id="nama_paket" value="{{$paket->nama_paket}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-6">
            <input type="text" name="harga" class="form-control" id="harga" value="{{$paket->harga}}">
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