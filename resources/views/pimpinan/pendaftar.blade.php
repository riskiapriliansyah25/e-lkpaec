@extends('layouts.adminmaster') 
@section('title', 'Pendaftar')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<hr>
<a href="{{url('/pimpinan/pendaftar/exportpdf')}}" class="btn btn-success btn-sm">PDF</a>
<hr>
<div class="card border-left-primary">
    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_pendaftar as $pendaftar)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pendaftar->nama}}</td>
                    <td>{{$pendaftar->alamat}}</td>
                    <td>{{$pendaftar->no_hp}}</td>
                    <td>{{$pendaftar->jenis_kelamin}}</td>
                    @if($pendaftar->status = 1)
                    <td>Terdaftar</td>
                    @else
                    <td>Belum terdaftar</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


