@extends('layouts/elearningmaster')
@section('title', 'LKP AEC')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Learning english <span>faster</span> <br> and <span>better</span> with us</h1>
    </div>
</div>
<!-- end jumbotron -->
<div class="container my-5">
    @if(session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>
    @endif
    @if(session('gagal'))
    <div class="alert alert-danger" role="alert">
    {{session('gagal')}}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Change Password</div>
            </div>
            <div class="card-body">
                <form action="{{url('e-learning/profile/gantipassword')}}" method="post">
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
                        <label for="password_2">Ulangi Password</label>
                        <input type="password" name="password_2" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">Ganti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<style>
    .card-body{
        border-bottom: 4px solid lightskyblue;
    }
    .card-header{
        background-color : lightblue !important;
    }
</style>
@endpush
