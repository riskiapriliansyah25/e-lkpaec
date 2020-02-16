@extends('layouts.adminmaster')
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
        <li class="breadcrumb-item active"><small><a href="{{url('/laporanlatihan/detail-latihan/'.$coba->id)}}">Paket Soal</a></small></li>
        <li class="breadcrumb-item active"><small><a href="{{url('/laporanlatihan/detail-latihan/'.$coba->id.'/paket-latihan/'.$soallatihan->id)}}">Paket Soal</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Detail</small></li>
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
               <tr>
                   <td width="150">Kelas</td>
                   <td width="30">:</td>
                   <td>{{$siswa->coba->nama_kelas}}</td>
               </tr>
               <tr>
                   <td width="150">Paket Soal</td>
                   <td width="30">:</td>
                   <td>{{$soallatihan->buku->nama_buku}}</td>
               </tr>
               <tr>
                   <td width="150">Jumlah Soal</td>
                   <td width="30">:</td>
                   <td>{{$soallatihan->detailsoallatihan->count()}}</td>
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
                    <td>{!!$jawab->detailsoallatihan->soal!!}</td>
                    <td>{{$jawab->pilihan}}</td>
                    <td>{{$jawab->detailsoallatihan->kunci}}</td>
                    <td>{{$jawab->score}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection