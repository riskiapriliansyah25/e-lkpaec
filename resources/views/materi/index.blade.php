@extends('layouts.adminmaster') 
@section('title', 'Materi')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
@if(isset($kata_kunci) == null)
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-1" data-toggle="modal" data-target="#exampleModal">
  <li class="fas fa-fw fa-plus"></li>
</button>
<!-- End Button -->
@else
@endif

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<table class="table table-hover" id="dataTable">
  <thead>
    <tr>
      <th scope="col">Materi ID</th>
      <th scope="col">Judul</th>
      <th scope="col">slug</th>
      <th scope="col">Kategori</th>
      <th scope="col">Upload</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($list_materi as $materi)
    <tr>
      <th scope="row">{{$materi->id}}</th>
      <td><a href="{{url('materi/'.$materi->id)}}">{{$materi->judul}}</a></td>
      <td>{{$materi->slug}}</td>
      <td>{{$materi->buku->nama_buku}}</td>
      <td>{{$materi->user->name}}</td>
      <td>
          <a href="{{url('materi/'.$materi->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{url('/materi/'.$materi->id)}}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<hr>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/materii')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}">
            </div>
            <div class="form-group">
                <label for="buku_id">Kategori</label>
                <select name="buku_id" id="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                  <option value="">pilih...</option>
                  @foreach($list_buku as $buku)
                    <option value="{{$buku->id}}">{{$buku->nama_buku}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="materi">Materi</label>
              <input type="file" name="materi" class="form-control @error('materi') is-invalid @enderror">
              @error('materi') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror">{{old('deskripsi')}}</textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          
    </div>
  </div>
</div>


@endsection


