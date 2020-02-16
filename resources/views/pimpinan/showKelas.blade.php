@extends('layouts.adminmaster') 
@section('title', 'Detail Kelas')
@section('content')
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$coba->nama_kelas}}</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/pimpinan')}}">Home</a></li>
        <li class="breadcrumb-item "><a href="{{url('/pimpinan/kelas')}}">Daftar Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
      </ol>
    </nav>
  </div>
</div>



<div class="card">
  <div class="card-body">
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">NIS</th>
          <th scope="col">Nama Siswa</th>
          <th scope="col">Buku</th>
          <th scope="col">Instruktur</th>
        </tr>
      </thead>
      <tbody>
          @foreach($list_siswa as $siswa)
        <tr>
          <td>{{$siswa->nis}}</td>
          <td>{{$siswa->nama}}</td>
          <td>{{$siswa->buku->nama_buku}}</td>
          <td>{{$coba->instruktur->nama}}</td>
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


