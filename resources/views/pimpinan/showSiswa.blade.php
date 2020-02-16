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
        <li class="breadcrumb-item "><a href="{{url('/pimpinan/siswa')}}">Daftar Siswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </nav>
  </div>
</div>

<div class="card mb-3 col-lg-12">
    <div class="row no-gutters">
        <div class="card-body col-md-4">
            @if(isset($siswa->foto))
            <img src="{{asset('img/siswa/'.$siswa->foto)}}" class="card-img img-thumbnail">
            @else
            @if($siswa->jenis_kelamin == 'L')
            <img src="{{asset('img/siswa/dummymale.jpg')}}" class="card-img">
            @else
            <img src="{{asset('img/siswa/dummyfemale.jpg')}}" class="card-img">
            @endif
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>Nis</td>
                        <td>:</td>
                        <td>{{$siswa->nis}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$siswa->nama}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$siswa->alamat}}</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td>{{$siswa->no_hp}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>Buku</td>
                        <td>:</td>
                        @if($siswa->buku_id == null)
                        <td>Buku belum ditentukan</td>
                        @else
                        <td>{{$siswa->buku->nama_buku}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        @if($siswa->kelas_id == null)
                        <td>Kelas belum ditentukan</td>
                        @else
                        <td>{{$siswa->coba->nama_kelas}}</td>
                        @endif
                    </tr>
                    @if(isset($siswa->kelas_id))
                    <tr>
                        <td>Instruktur</td>
                        <td>:</td>
                        <td>{{$siswa->coba->instruktur->nama}}</td>
                    </tr>
                    @endif
                </table>
                <a href="{{url('/pimpinan/siswa/exportpdf/'.$siswa->id)}}" class="btn btn-success float-right mr-1">Laporan</a>
            </div>
        </div>
    </div>
</div>


@endsection
