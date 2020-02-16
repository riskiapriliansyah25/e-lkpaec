@extends('layouts.adminmaster') 
@section('title', $title)
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
        <li class="breadcrumb-item active" aria-current="page"><small>Daftar Pendaftar</small></li>
      </ol>
    </nav>
  </div>
</div>

            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                 {{session('sukses')}}
                </div>
            @endif
            <a href="{{url('/pendaftarr/export')}}" class="btn btn-success btn-sm">PDF</a>
<hr>

<div class="card border-left-info">
  <div class="card-body">
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">NO HP</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach($daftar as $p)
        <tr>
          <th scope="row">{{$p->id}}</th>
          <td><a href="{{url('/pendaftar/'.$p->id)}}">{{$p->nama}}</a> </td>
          <td>{{$p->no_hp}}</td>
          <td>{{$p->jenis_kelamin}}</td>
          <td>
          @if($p->status == 1)
            Sukses
            @else
            Belum Registrasi
            @endif
          </td>
          <td>
            @if($p->status == 0)
              <a href="{{url('/pendaftar/'.$p->id.'/register')}}" class="btn btn-warning btn-sm">Registrasi</a>
            @else
            @endif
            <form action="{{url('/pendaftar/'.$p->id)}}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm"  title="Delete"><i class="fas fa-trash"></i></button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection


