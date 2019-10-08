@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                 {{session('sukses')}}
                </div>
            @endif

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
      <td><a href="{{url('/daftar/'.$p->id)}}">{{$p->nama}}</a> </td>
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
          <a href="/pendaftar/{{$p->id}}/register" class="btn btn-warning btn-sm">Registrasi</a>
        @else
        @endif
          <form action="/pendaftar/{{$p->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection


