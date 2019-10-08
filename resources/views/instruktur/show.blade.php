@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<div class="card mb-3 col-lg-8" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      @if(isset($instruktur->avatar))
                      <img src="{{asset('img/instruktur/'.$instruktur->avatar)}}" class="card-img">
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
                        <h5 class="card-title">{{$instruktur->nii}}</h5>
                        <h5 class="card-title">{{$instruktur->nama}}</h5>
                        <p class="card-text">{{$instruktur->tempat_lahir}}, {{$instruktur->tanggal_lahir}}</p>
                        <p class="card-text">{{$instruktur->jabatan}}</p>
                        <p class="card-text">{{$instruktur->no_hp}}</p>
                        <p class="card-text">{{$instruktur->jenis_kelamin}}</p>
                        <p class="card-text">{{$instruktur->tgl_mulai_bertugas}}</p>
                        <a href="{{url('/instruktur/'.$instruktur->id.'/edit')}}" class="btn btn-warning float-right mb-2"><li class="fas fa-fw fa-user-edit"></li> Edit</a>
                      </div>
                    </div>
                  </div>
                </div>


@endsection


