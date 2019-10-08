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
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
<hr>

<table class="table table-hover" id="dataTable">
  <thead>
    <tr>
      <th scope="col">NII</th>
      <th scope="col">Nama</th>
      <th scope="col">Jabatan</th>
      <th scope="col">No HP</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($list_instruktur as $instruktur)
    <tr>
      <th scope="row">{{$instruktur->nii}}</th>
      <td>{{$instruktur->nama}}</td>
      <td>{{$instruktur->jabatan}}</td>
      <td>{{$instruktur->no_hp}}</td>
      <td>{{$instruktur->jenis_kelamin}}</td>
      <td>
          <a href="{{url('/instruktur/'.$instruktur->id)}}" class="btn btn-success btn-sm">Details</a>
          <a href="{{url('instruktur/'.$instruktur->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{url('/instruktur/'.$instruktur->id)}}" method="post" class="d-inline">
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
    <h4>Jumlah Instruktur: {{$jumlah_instruktur}}</h4>
  </div>
  <div class="col-md-9">
  </div>
</div>
<hr>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Instruktur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/instruktur')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="nii">NII</label>
                <input type="text" name="nii" id="nii" class="form-control" value="{{$nii}}" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tempat_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                  <option value="Instruktur">Instruktur</option>
                  <option value="Admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                    <option value="">Plih..</option>
                    <option value="SMA">SMA</option>
                    <option value="SMK">SMK</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="">Pilih...</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_mulai_bertugas">Tanggal Mulai Bertugas</label>
                <input type="date" name="tgl_mulai_bertugas" id="tgl_mulai_bertugas" class="form-control">
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


