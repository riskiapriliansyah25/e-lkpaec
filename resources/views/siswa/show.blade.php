@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<div class="card mb-3 col-lg-8" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      @if(isset($siswa->foto))
                      <img src="{{asset('img/siswa/'.$siswa->foto)}}" class="card-img">
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
                        <h5 class="card-title">{{$siswa->nis}}</h5>
                        <h5 class="card-title">{{$siswa->nama}}</h5>
                        <p class="card-text">{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</p>
                        <p class="card-text">{{$siswa->alamat}}</p>
                        <p class="card-text">{{$siswa->no_hp}}</p>
                        <p class="card-text">{{$siswa->jenis_kelamin}}</p>
                        <p class="card-text">{{$siswa->buku->nama_buku}}</p>
                        <p class="card-text">{{$siswa->coba->nama_kelas}}</p>
                        <p class="card-text">{{$siswa->coba->instruktur->nama}}</p>
                        @if(Auth::user()->role == 'instruktur')
                        @else
                        <a href="{{url('/siswa/'.$siswa->id.'/edit')}}" class="btn btn-warning float-right mb-2"><li class="fas fa-fw fa-user-edit"></li> Edit</a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>


@endsection


