@extends('layouts/adminmaster')
@section('title', 'Change Password')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
@if(session('gagal'))
<div class="alert alert-danger my-3" role="alert">
  {{session('gagal')}}
</div>
@endif

<div class="row">
    <div class="col-md-5">
        <form action="{{url('/user/'.$user->id)}}" method="post">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="password_lama">Password Lama</label>
                <input type="password" name="password_lama" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_1">Password Baru</label>
                <input type="password" name="password_1" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_1">Ulangi Password</label>
                <input type="password" name="password_2" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ganti Password</button>
            </div>
        </form>
    </div>
</div>
@endsection