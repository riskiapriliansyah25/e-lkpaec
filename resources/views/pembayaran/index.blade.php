@extends('layouts.adminmaster') 
@section('title', 'Pembayaran')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_siswa as $siswa)
                <tr>
                    <td>{{$siswa->nis}}</td>
                    <td>{{$siswa->nama}}</td>
                    @if($siswa->status == 1)
                    <td><span class="badge badge-primary">Aktif</span></td>
                    @else
                    <td><span class="badge badge-danger">Tidak aktif</span></td>
                    @endif
                    <td>
                        <a href="{{url('/pembayaran/show/'.$siswa->id)}}" class="btn btn-success btn-sm">Bayar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection


