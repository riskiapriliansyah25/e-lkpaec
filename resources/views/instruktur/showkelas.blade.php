@extends('layouts.adminmaster') 
@section('title', $kelas_ajar->nama_kelas)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{$kelas_ajar->nama_kelas}}</h1>

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
      <th scope="col">NIS</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Buku</th>
      <th scope="col">Instruktur</th>
    </tr>
  </thead>
  <tbody>
      @foreach($list_siswa as $siswa)
     <tr>
         <th>{{$siswa->nis}}</th>
         <td><a href="{{url('/siswa/'.$siswa->id)}}">{{$siswa->nama}}</a></td>
         <td>{{$siswa->buku->nama_buku}}</td>
         <td>{{$kelas_ajar->instruktur->nama}}</td>
     </tr>
     
   @endforeach
  </tbody>
</table>
<hr>
<div class="row">
  <div class="col-md-3">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/kelas')}}" method="post">
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


