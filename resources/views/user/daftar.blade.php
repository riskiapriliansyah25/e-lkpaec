@extends('layouts.adminmaster') 
@section('title', 'Daftar User')
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
        <li class="breadcrumb-item active" aria-current="page"><small>Daftar User</small></li>
      </ol>
    </nav>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-1 btn-sm" data-toggle="modal" data-target="#exampleModal">
  <li class="fas fa-fw fa-plus"></li>
</button>
<!-- End Button -->

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
<hr>

<div class="card border-left-info">
  <div class="card-body">
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">ID User</th>
          <th scope="col">Nama</th>
          <th scope="col">Role</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($list_user as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->role}}</td>
          <td>
            <a href="{{url('/user/'.$user->id.'/profile')}}" class="btn btn-success btn-sm">Details</a>
            <a href="{{url('/user/'.$user->id.'/changepassword')}}" class="btn btn-warning btn-sm">Ganti Password</a>
            <form action="{{url('/user/'.$user->id)}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/user/daftar')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                @error('nama') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{old('tanggal_lahir')}}">
                @error('username') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                <option value="">Pilih..</option>
                <option value="admin">Admin</option>
                <option value="siswa">Siswa</option>
                <option value="instruktur">Instruktur</option>
              </select>
              @error('role') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
      </div>    
    </div>
  </div>
</div>
@endsection


