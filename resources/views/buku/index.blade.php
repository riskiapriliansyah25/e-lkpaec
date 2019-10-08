@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-1" data-toggle="modal" data-target="#exampleModal">
  <li class="fas fa-fw fa-plus"></li>
</button>
<!-- End Button -->
<hr>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

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
<hr>
<div class="row">
  <div class="col-md-3">
    <h4>Jumlah Buku: {{$jumlah_buku}}</h4>
  </div>
  <div class="col-md-9">
    <div class="float-right">{{$list_buku->links()}}</div>
  </div>
</div>
<hr>


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
                <label for="buku_id">Buku ID</label>
                <input type="text" name="buku_id" id="buku_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_buku">Nama buku</label>
                <input type="text" name="nama_buku" id="nama_buku" class="form-control">
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


