@extends('layouts.adminmaster')
@section('title', 'Profile User')
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
                <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i>
                            Home</a></small></li>
                <li class="breadcrumb-item active"><small><a href="{{url('/user/daftar')}}">Daftar User</a></small></li>
                <li class="breadcrumb-item active" aria-current="page"><small>Detail User</small></li>
            </ol>
        </nav>
    </div>
</div>

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<div class="card mb-3" style="max-width: 540px;">
    <div class="card-body">
        <form action="{{url('/user/'.$user->id.'/profile')}}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" class="form-control" value="{{$user->id}}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{$user->username}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                    <option value="siswa" @if($user->role == 'siswa') selected @endif>Siswa</option>
                    <option value="instruktur" @if($user->role == 'instruktur') selected @endif>Instruktur</option>
                </select>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('img/user/'.$user->avatar)}}" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                        @error('avatar') <div class="invalid-feedback"> {{$message}}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right">Edit</button>
                <a href="{{url('/user/'.$user->id.'/changepassword')}}" class="btn btn-warning float-right mr-1">Ganti
                    Password</a>
            </div>
        </form>
        <form action="{{url('user/resetpassword/'.$user->id)}}" method="post">
        @method('patch')
        @csrf
            <button type="submit" class="btn btn-success float-right mr-1">Reset Password</button>
        </form>
    </div>
</div>





@endsection
