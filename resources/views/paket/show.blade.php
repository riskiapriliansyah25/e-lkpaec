@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<div class="card mb-3 col-lg-8" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="{{asset('img/paket/'.$paket->avatar)}}" class="card-img">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">{{$paket->paket_id}}</h5>
                        <h5 class="card-title">{{$paket->nama_paket}}</h5>
                        <p class="card-text">{{$paket->harga_paket}}</p>
                        <a href="{{url('/paket/'.$paket->id.'/edit')}}" class="btn btn-warning float-right mb-2"><li class="fas fa-fw fa-user-edit"></li> Edit</a>
                      </div>
                    </div>
                  </div>
                </div>


@endsection


