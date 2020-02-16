@extends('layouts.adminmaster')
@section('title', 'Pendaftar')
@section('content')
<!-- Page Heading -->
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i> Home</a></small></li>
        <li class="breadcrumb-item active"><small><a href="{{url('/pendaftar')}}">Daftar Pendaftar</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Detail Pendaftar</small></li>
      </ol>
    </nav>
  </div>
</div>

<div class="card mb-3 col-lg-12">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>No daftar</td>
                        <td>:</td>
                        <td>{{$daftar->id}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$daftar->nama}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{$daftar->tempat_lahir}}, {{$daftar->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$daftar->alamat}}</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td>{{$daftar->no_hp}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{$daftar->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        @if($daftar->status == 1)
                        <td>Terdaftar</td>
                        @else
                        <td>Belum terdaftar</td>
                        @endif
                    </tr>
                </table>
                @if($daftar->status == 0)
                <a href="{{url('/pendaftar/'.$daftar->id.'/register')}}" class="btn btn-warning btn-sm">Registrasi</a>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection
