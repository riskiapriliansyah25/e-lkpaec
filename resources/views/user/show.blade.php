@extends('layouts.adminmaster') 
@section('title', 'Profile User')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

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
            <a href="{{url('/user/'.$user->id.'/changepassword')}}" class="btn btn-warning float-right">Ganti Password</a>
        </div>
        </form>
    </div>
</div>
    
            
            


@endsection


