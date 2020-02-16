@extends('layouts.adminmaster') 
@section('title', $title)
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
        <li class="breadcrumb-item active"><small><a href="{{url('/instruktur')}}">Daftar Instruktur</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Detail</small></li>
      </ol>
    </nav>
  </div>
</div>

<div class="card mb-3 col-lg-12">
    <div class="row no-gutters">
        <div class="card-body col-md-4">
            @if(isset($instruktur->foto))
            <img src="{{asset('img/instruktur/'.$instruktur->foto)}}" class="card-img img-thumbnail">
            @else
            @if($instruktur->jenis_kelamin == 'L')
            <img src="{{asset('img/instruktur/dummymale.jpg')}}" class="card-img">
            @else
            <img src="{{asset('img/instruktur/dummyfemale.jpg')}}" class="card-img">
            @endif
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>NII</td>
                        <td>:</td>
                        <td>{{$instruktur->nii}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$instruktur->nama}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{$instruktur->tempat_lahir}}, {{$instruktur->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{$instruktur->jabatan}}</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td>{{$instruktur->no_hp}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{$instruktur->jenis_kelamin}}</td>
                    </tr>
                    
                </table>
                <a href="{{url('/instruktur/'.$instruktur->id.'/edit')}}" class="btn btn-warning float-right mb-2">
                    <li class="fas fa-fw fa-user-edit"></li> Edit
                </a>
                <a href="{{url('/instruktur/exportpdf/'.$instruktur->id)}}" class="btn btn-success float-right mr-1">Laporan</a>
            </div>
        </div>
    </div>
</div>


@endsection


