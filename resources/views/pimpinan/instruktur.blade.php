@extends('layouts.adminmaster') 
@section('title', 'Instruktur')
@section('content')
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/pimpinan')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar Instruktur</li>
      </ol>
    </nav>
  </div>
</div>
<hr>
<a href="{{url('/pimpinan/instruktur/exportpdf')}}" class="btn btn-success btn-sm">PDF</a>
<hr>
<div class="card border-left-primary">
    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>NII</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_instruktur as $instruktur)
                <tr>
                    <td>{{$instruktur->nii}}</td>
                    <td>{{$instruktur->nama}}</td>
                    <td>{{$instruktur->jabatan}}</td>
                    <td>{{$instruktur->no_hp}}</td>
                    <td>{{$instruktur->jenis_kelamin}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection