@extends('layouts.adminmaster')
@section('title', $title)
@section('content')
<h1 class="h3">Daftar Ulang</h1>
<form action="{{url ('/pendaftar/'.$daftar->id.'/register')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" value="{{$nis_siswa}}" readonly>
                @error('nis') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$daftar->nama}}">
                @error('nama') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{$daftar->tempat_lahir}}">
                @error('tempat_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tempat_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{$daftar->tanggal_lahir}}">
                @error('tanggal_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$daftar->alamat}}">
                @error('alamat') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{$daftar->no_hp}}">
                @error('no_hp') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">Pilih...</option>
                    <option value="L" @if($daftar->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if($daftar->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
                @error('jenis_kelamin') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Sukses</option>
                    <option value="0">Belum Terdaftar</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
@endsection