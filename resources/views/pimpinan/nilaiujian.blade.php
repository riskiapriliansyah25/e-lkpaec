@extends('layouts.adminmaster') 
@section('title', 'Nilai Ujian')
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
        <li class="breadcrumb-item active" aria-current="page">Nilai Ujian</li>
      </ol>
    </nav>
  </div>
</div>

<hr>
<a href="{{url('/pimpinan/nilai-ujian/exportpdf')}}" class="btn btn-success btn-sm">PDF</a>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                Laporan Hasil Ujian
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Paket Soal</th>
                            <th>Jenis</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_siswa as $siswa)
                        <tr>
                            <td>{{$siswa->user->siswa->nis}}</td>
                            <td>{{$siswa->user->siswa->nama}}</td>
                            @if(isset($siswa->user->siswa->kelas_id))
                            <td>{{$siswa->user->siswa->coba->nama_kelas}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{$siswa->soal->buku->nama_buku}}</td>
                            <td>{{$siswa->soal->jenis}}</td>
                            <td>{{$siswa->nilai}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection