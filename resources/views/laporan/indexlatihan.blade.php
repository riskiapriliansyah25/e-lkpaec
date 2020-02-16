@extends('layouts/adminmaster')
@section('title', 'Laporan Latihan')
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
        <li class="breadcrumb-item active" aria-current="page"><small>Laporan Latihan</small></li>
      </ol>
    </nav>
  </div>
</div>


<div class="row">
    <div class="col-md-9">
        <div class="card border-bottom-primary">
            <div class="card-header">
                Laporan Per-Kelas
            </div>
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Auth::user()->role == 'admin')
                            @foreach($list_kelas as $kelas)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kelas->nama_kelas}}</td>
                                <td>
                                    <a href="{{url('/laporanlatihan/detail-latihan/'.$kelas->id)}}" class="btn btn-success btn-sm">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            @foreach($list_kelasi as $kelas)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kelas->nama_kelas}}</td>
                                <td>
                                    <a href="{{url('/laporanlatihan/detail-latihan/'.$kelas->id)}}" class="btn btn-success btn-sm">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection