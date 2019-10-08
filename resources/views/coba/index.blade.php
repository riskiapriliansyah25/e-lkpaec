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
<!-- Search -->
<div class="row">
    <div class="col-md-4"><div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari...">
  <div class="input-group-append">
    <button class="btn btn-outline-success" type="button" id="button-addon2">Cari</button>
  </div>
    </div>
    </div>
</div>
<!-- end Search -->
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<table class="table table-hover" id="dataTable">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Kelas</th>
      <th scope="col">Instruktur</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($list_kelas as $kelas)
    <tr>
      <th scope="row">{{$kelas->id}}</th>
      <td><a href="{{url('/coba/'.$kelas->id)}}">{{$kelas->nama_kelas}}</a> </td>
      <td>{{$kelas->instruktur->nama}}</td>
      <td>
          <a href="{{url('kelas/'.$kelas->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{url('/kelas/'.$kelas->id)}}" method="post" class="d-inline">
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
</div>
<hr>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/coba')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="form-control">
            </div>
            <div class="form-group">
              <label for="instruktur_id">Instruktur</label>
              <select name="instruktur_id" id="instruktur_id" class="form-control">
                <option value="">Pilih...</option>
                @foreach($list_instruktur as $instruktur)
                <option value="{{$instruktur->id}}">{{$instruktur->nama}}</option>
                @endforeach
              </select>
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


