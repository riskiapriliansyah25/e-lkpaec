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
        <li class="breadcrumb-item active" aria-current="page"><small>Daftar Kelas</small></li>
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

<!-- end Search -->
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<div class="card border-left-info">
  <div class="card-body">
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Kelas</th>
          <th scope="col">Instruktur</th>
          <th scope="col">Jumlah Siswa</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach($list_kelas as $kelas)
        <tr>
          <th scope="row">{{$kelas->id}}</th>
          <td><a href="{{url('/coba/'.$kelas->id)}}">{{$kelas->nama_kelas}}</a> </td>
          <td>{{$kelas->instruktur->nama}}</td>
          <td>{{$kelas->siswa->where('status', 1)->count()}}</td>
          <td>
              <a href="{{url('coba/'.$kelas->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{url('/coba/'.$kelas->id)}}" method="post" class="d-inline">
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
                <input type="text" name="nama_kelas" id="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror">
                @error('nama_kelas') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
              <label for="instruktur_id">Instruktur</label>
              <select name="instruktur_id" id="instruktur_id" class="form-control @error('instruktur_id') is-invalid @enderror">
                <option value="">Pilih...</option>
                @foreach($list_instruktur as $instruktur)
                <option value="{{$instruktur->id}}">{{$instruktur->nama}}</option>
                @endforeach
              </select>
              @error('instruktur_id') <div class="invalid-feedback"> {{$message}}</div> @enderror
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


