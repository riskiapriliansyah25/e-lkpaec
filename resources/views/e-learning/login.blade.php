@extends('layouts/elearningmaster')
@section('title', 'LKP AEC')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Learning english <span>faster</span> <br> and <span>better</span> with us</h1>
    </div>
</div>
<div class="row justify-content-center my-5" id="login">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        <hr>
                        @if(session('gagal'))
                        <div class="alert alert-danger" role="alert">
                        {{session('gagal')}}
                        </div>
                        @endif
                        <form action="{{url('/userlogin')}}" method="post" class="user">
                        @csrf
                            <div class="form-group">
                                <input type="username" name="username" placeholder="Masukkan Username" class="form-control form-control-user" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- end jumbotron -->
@endsection
