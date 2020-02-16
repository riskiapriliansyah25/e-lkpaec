@extends('layouts.adminmaster')
@section('title', 'Laporan Hasil Ujian')
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
        <li class="breadcrumb-item active"><small><a href="{{url('/laporanujian')}}">Laporan Ujian</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Laporan Ujian</small></li>
      </ol>
    </nav>
  </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
               <tr>
                   <td width="150">Nama</td>
                   <td width="30">:</td>
                   <td>{{$siswa->nama}}</td>
               </tr>
               @if(isset($siswa->kelas_id))
               <tr>
                   <td width="150">Kelas</td>
                   <td width="30">:</td>
                   <td>{{$siswa->coba->nama_kelas}}</td>
               </tr>
               @endif
               <tr>
                   <td width="150">Paket Soal</td>
                   <td width="30">:</td>
                   <td>{{$soal->buku->nama_buku}}</td>
               </tr>
               <tr>
                   <td width="150">Jumlah Soal</td>
                   <td width="30">:</td>
                   <td>{{$soal->detailsoal->count()}}</td>
               </tr>
               <tr>
                   <td width="50">Nilai</td>
                   <td width="30">:</td>
                   <td>{{$nilai}}</td>
               </tr>
        </table>

        <div class="card-body">
        <h1 class="h3 mb-4 text-gray-800">Jawaban</h1>
        <table class="table table-hovered" id="dataTable">
            <thead>
                <tr>
                    <th>Soal</th>
                    <th>Jawaban</th>
                    <th>Kunci</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jawaban as $jawab)
                <tr>
                    <td>{!!$jawab->detailsoal->soal!!}</td>
                    <td>{{$jawab->pilihan}}</td>
                    <td>{{$jawab->detailsoal->kunci}}</td>
                    <td>{{$jawab->score}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection