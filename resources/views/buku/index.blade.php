@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i> Home</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Daftar Buku</small></li>
      </ol>
    </nav>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-1 btn-sm" data-toggle="modal" data-target="#exampleModal">
  <li class="fas fa-fw fa-plus"></li>
</button>
<!-- End Button -->
<hr>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<div class="row">
  <div class="col-md-10">
    <div class="card border-left-info">
      <div class="card-body">
        <table class="table table-hover" id="dataTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach($list_buku as $buku)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$buku->nama_buku}}</td>
              <td>
                  <a href="{{url('buku/'.$buku->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{url('/buku/'.$buku->id)}}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
        
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/buku')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="nama_buku">Nama buku</label>
                <input type="text" name="nama_buku" id="nama_buku" class="form-control @error('nama_buku') is-invalid @enderror">
                @error('nama_buku') <div class="invalid-feedback"> {{$message}}</div> @enderror
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


