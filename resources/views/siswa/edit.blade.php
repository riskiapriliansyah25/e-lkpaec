@extends('layouts.adminmaster')
@section('title', $title)
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<form action="{{url('/siswa/'.$siswa->id)}}" method="post" enctype="multipart/form-data">
@method('patch')
@csrf
    <div class="form-group row">
        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-6">
            <input type="text" name="nis" class="form-control" id="nis" value="{{$siswa->nis}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-6">
            <input type="text" name="nama" class="form-control" id="nama" value="{{$siswa->nama}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-6">
            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{$siswa->tempat_lahir}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-6">
            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{$siswa->tanggal_lahir}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-6">
            <input type="text" name="alamat" class="form-control" id="alamat" value="{{$siswa->alamat}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-6">
            <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{$siswa->no_hp}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-6">
           <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
               <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
               <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
           </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="buku_id" class="col-sm-2 col-form-label">Buku</label>
        <div class="col-sm-6">
        <select name="buku_id" id="buku_id" class="form-control">
                <option value="">Pilih..</option>
                @foreach($list_buku as $buku)
                    <option value="{{$buku->id}}" @if($siswa->buku_id == $buku->id) selected @endif>{{$buku->nama_buku}}</option>
                  @endforeach
                </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="kelas_id" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-6">
        <select name="kelas_id" id="kelas_id" class="form-control">
                <option value="">Pilih..</option>
                @foreach($list_kelas as $kelas)
                    <option value="{{$kelas->id}}" @if($siswa->kelas_id == $kelas->id) selected @endif>{{$kelas->nama_kelas}}</option>
                  @endforeach
                </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="foto" class="col-sm-2 col-form-label">foto</label>
        <div class="col-md-2">
        <img src="{{asset('img/siswa/'.$siswa->foto)}}" class="img-thumbnail">
        </div>
        <div class="col-sm-4">
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto">
        </div>
    </div>
    <div class="form-group row">
        <label for="avatar" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-6">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" @if($siswa->status == 1) checked @endif>
            <label class="form-check-label" for="inlineRadio1">Aktif</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" @if($siswa->status == 0) checked @endif>
            <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
            </div>
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