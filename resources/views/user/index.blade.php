@extends('layouts.adminmaster') 
@section('title', 'My Profile')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<div class="card mb-3 col-lg-8" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img class="card-img" src="
                      @if(auth()->user()->role == 'admin')
                      {{asset('img/user/dummymale.jpg')}}
                      @endif
                      @if(Auth::user()->role == 'instruktur')
                      @if(isset(Auth::user()->instruktur->foto))
                      {{asset('img/instruktur/'.Auth::user()->instruktur->foto)}}
                      @else
                        @if(auth()->user()->instruktur->jenis_kelamin == 'L')
                          {{asset('img/instruktur/dummymale.jpg')}}
                        @else
                          {{asset('img/instruktur/dummyfemale.jpg')}}
                        @endif
                      @endif
                      @endif
                      @if(auth()->user()->role == 'siswa')
                      @if(isset(auth()->user->siswa->foto))
                      {{asset('img/siswa/'.auth()->user()->siswa->foto)}}
                      @else
                        @if(auth()->user()->siswa->jenis_kelamin == 'L')
                          {{asset('img/siswa/dummymale.jpg')}}
                        @else
                          {{asset('img/siswa/dummyfemale.jpg')}}
                        @endif
                      @endif
                      @endif
                      ">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">
                          @if(auth()->user()->role == "admin")
                          {{auth()->user()->name}}
                          @endif
                          @if(auth()->user()->role == "instruktur")
                          {{auth()->user()->instruktur->nama}}
                          @endif
                        </h5>
                        @if(auth()->user()->role == "instruktur")
                        <h5 class="card-title">
                          {{auth()->user()->instruktur->nii}}
                        </h5>                      
                        <h5 class="card-title">
                          {{auth()->user()->instruktur->tempat_lahir}}, {{auth()->user()->instruktur->tanggal_lahir}}
                        </h5>                      
                        <h5 class="card-title">
                          {{auth()->user()->instruktur->jabatan}}
                        </h5> 
                        <a href="{{url('/user/'.Auth::user()->id.'/changepassword')}}" class="btn btn-warning float-right">Ganti password</a>       
                        @endif
                      </div>
                    </div>
                  </div>
                </div>


@endsection


