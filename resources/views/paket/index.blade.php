@extends('layouts.adminmaster') 
@section('title', 'Daftar Paket')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-1" data-toggle="modal" data-target="#exampleModal">
  <li class="fas fa-fw fa-plus"></li>
</button>

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<div class="card">
  <div class="card-body">
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach($list_paket as $paket)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$paket->nama_paket}}</td>
          <td>{{$paket->harga}}</td>
          <td>
              <a href="{{url('paket/'.$paket->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{url('/paket/'.$paket->id)}}" method="post" class="d-inline">
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/paket')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="nama_paket">Nama Paket</label>
                <input type="text" name="nama_paket" id="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror">
                @error('nama_paket') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror">
                @error('harga') <div class="invalid-feedback"> {{$message}}</div> @enderror
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


