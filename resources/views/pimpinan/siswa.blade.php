@extends('layouts.adminmaster') 
@section('title', 'Siswa')
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
        <li class="breadcrumb-item active" aria-current="page">Daftar Siswa</li>
      </ol>
    </nav>
  </div>
</div>

<hr>
<a href="{{url('/pimpinan/siswa/exportpdf')}}" class="btn btn-success btn-sm">PDF</a>
<hr>
<div class="card border-left-primary">
    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_siswa as $siswa)
                <tr>
                    <td>{{$siswa->nis}}</td>
                    <td><a href="{{url('/pimpinan/siswa/'.$siswa->id)}}">{{$siswa->nama}}</a></td>
                    <td>{{$siswa->alamat}}</td>
                    <td>{{$siswa->no_hp}}</td>
                    <td>{{$siswa->jenis_kelamin}}</td>
                    @if(isset($siswa->kelas_id))
                    <td>{{$siswa->coba->nama_kelas}}</td>
                    @else
                    <td><span class="badge badge-danger">Belum ada kelas</span></td>
                    @endif
                    @if($siswa->status = 1)
                    <td>Aktif</td>
                    @else
                    <td>Tidak Aktif</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection