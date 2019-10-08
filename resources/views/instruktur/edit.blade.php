@extends('layouts.adminmaster')
@section('title', $title)
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<form action="{{url('/instruktur/'.$instruktur->id)}}" method="post">
@method('patch')
@csrf
    <div class="form-group row">
        <label for="nii" class="col-sm-2 col-form-label">NII</label>
        <div class="col-sm-6">
            <input type="text" name="nii" class="form-control" id="nii" value="{{$instruktur->nii}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-6">
            <input type="text" name="nama" class="form-control" id="nama" value="{{$instruktur->nama}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-6">
            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{$instruktur->tempat_lahir}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-6">
            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{$instruktur->tanggal_lahir}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-6">
            <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{$instruktur->jabatan}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-6">
            <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{$instruktur->no_hp}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-6">
           <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
               <option value="L" @if($instruktur->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
               <option value="P" @if($instruktur->jenis_kelamin == 'P') selected @endif>Perempuan</option>
           </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="tgl_mulai_bertugas" class="col-sm-2 col-form-label">Tanggal Mulai Bertugas</label>
        <div class="col-sm-6">
            <input type="date" name="tgl_mulai_bertugas" class="form-control" id="tgl_mulai_bertugas" value="{{$instruktur->tgl_mulai_bertugas}}">
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