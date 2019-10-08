@extends('layouts.adminmaster') 
@section('title', $title)
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
<!-- Cari -->
<hr>
<div class="row">
  <div class="col-md-5">
    <form action="{{url('/paket/cari')}}" method="get">
      <div class="input-group mb-3">
        <input type="text" name="kata_kunci" class="form-control" placeholder="Cari..." autofocus autocomplete="off">
        <div class="input-group-append">
          <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
        </div>
    </form>
  </div>
</div>
</div>
<!-- end Search -->
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Paket ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($list_paket as $paket)
    <tr>
      <th scope="row">{{$paket->paket_id}}</th>
      <td>{{$paket->nama_paket}}</td>
      <td>{{$paket->harga_paket}}</td>
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
<hr>
<div class="row">
  <div class="col-md-3">
    <h4>Jumlah Paket: {{$jumlah_paket}}</h4>
  </div>
  <div class="col-md-9">
    <div class="float-right">{{$list_paket->links()}}</div>
  </div>
</div>
<hr>


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
                <label for="paket_id">Paket ID</label>
                <input type="text" name="paket_id" id="paket_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_paket">Nama Paket</label>
                <input type="text" name="nama_paket" id="nama_paket" class="form-control">
            </div>
            <div class="form-group">
                <label for="harga_paket">Harga</label>
                <input type="text" name="harga_paket" id="harga_paket" class="form-control">
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


