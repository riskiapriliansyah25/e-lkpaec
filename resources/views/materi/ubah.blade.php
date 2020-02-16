@extends('layouts.adminmaster')
@section('title', 'Edit Materi')
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<div class="card">
    <div class="card-body">
        <form action="{{url('/materi/'.$materi->id)}}" method="post">
        @method('patch')
        @csrf
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" name="judul" class="form-control" value="{{$materi->judul}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="buku_id" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-6">
                    <select name="buku_id" id="buku_id" class="form-control">
                        @foreach($list_buku as $buku)
                        <option value="{{$buku->id}}" @if($buku->id == $materi->buku_id) selected @endif>{{$buku->nama_buku}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="materi" class="col-sm-2 col-form-label">Materi</label>
                <div class="col-sm-6">
                    <input type="file" name="materi" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-6">
                    <textarea name="deskripsi" id="deskripsi"  rows="10" class="form-control">{{$materi->deskripsi}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-6">
                    <textarea name="deskripsi" id="deskripsi"  rows="10" class="form-control">{{$materi->deskripsi}}</textarea>
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