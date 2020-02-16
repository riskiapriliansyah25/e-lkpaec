@extends('layouts/adminmaster')
@section('title', 'Laporan')
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
        <li class="breadcrumb-item active"><small><a href="{{url('/laporanlatihan')}}">Laporan Latihan</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Paket Soal</small></li>
      </ol>
    </nav>
  </div>
</div>

<div class="card">
    <div class="card-header">
        Paket soal dalam kelas ({{$coba->nama_kelas}})
    </div>
    <div class="card-body">
        @if($list_soal->count())
        <table class="table" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Paket Soal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_soal as $soal)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$soal->soallatihan->buku->nama_buku}}: {{$soal->soallatihan->materi->judul}}</td>
                    <td>
                        <a href="{{url('/laporanlatihan/detail-latihan/'.$soal->id_kelas.'/paket-latihan/'.$soal->soallatihan->id)}}" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-info" role="alert">
        Belum ada soal
        </div>
        @endif
    </div>
</div>
@endsection