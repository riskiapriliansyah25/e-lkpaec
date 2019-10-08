@extends('layouts.adminmaster') 
@section('title', 'My Profile')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<div class="card mb-3 col-lg-8" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img class="card-img" src="
                      @if(auth()->user()->role == 'admin')
                      {{asset('img/user/'.auth()->user()->avatar)}}
                      @endif
                      @if(auth()->user()->role == 'instruktur')
                      @if(isset(auth()->user->instruktur->avatar))
                      {{asset('img/instruktur/'.auth()->user()->instruktur->avatar)}}
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
                          @if(auth()->user()->role == "siswa")
                          {{auth()->user()->siswa->nama}}
                          @endif
                          @if(auth()->user()->role == "instruktur")
                          {{auth()->user()->instruktur->nama}}
                          @endif
                        </h5>
                        <h5 class="card-title">
                        @if(auth()->user()->role == "siswa")
                          {{auth()->user()->siswa->nis}}
                          @endif
                          @if(auth()->user()->role == "instruktur")
                          {{auth()->user()->instruktur->nii}}
                          @endif
                        </h5>                      
                      </div>
                    </div>
                  </div>
                </div>


@endsection


