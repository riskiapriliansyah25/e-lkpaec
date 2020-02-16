@extends('layouts.adminmaster') 
@section('title', 'Kelas')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{$coba->nama_kelas}}</h1>



<table class="table table-hover" id="dataTable">
  <thead>
    <tr>
      <th scope="col">NIS</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Buku</th>
      <th scope="col">Instruktur</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($list_siswa as $siswa)
    <tr>
      <td>{{$siswa->nis}}</td>
      <td>{{$siswa->nama}}</td>
      <td>{{$siswa->buku->nama_buku}}</td>
      <td><a href="{{url('/instruktur/'.$coba->instruktur_id)}}">{{$coba->instruktur->nama}}</a></td>
      <td>
          <a href="{{url('rapot/detail/'.$coba->id.'/get-rapot/'.$siswa->id)}}" class="btn btn-primary btn-sm">Rapot</a>
      </td>
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





@endsection


