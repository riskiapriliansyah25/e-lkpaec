@extends('layouts.adminmaster') 
@section('title', 'Kelas')
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
      <li class="breadcrumb-item active" aria-current="page">Daftar Kelas</li>
      </ol>
    </nav>
  </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="card border-left-primary">
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kelas</th>
                            <th>Instruktur</th>
                            <th>Jumlah Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_kelas as $kelas)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{url('/pimpinan/kelas/'.$kelas->id)}}">{{$kelas->nama_kelas}}</a> </td>
                            <td>{{$kelas->instruktur->nama}}</td>
                            <td>{{$kelas->siswa->where('status', 1)->count()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection