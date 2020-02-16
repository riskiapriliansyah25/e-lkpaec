@extends('layouts/laporanmaster')
@section('title', 'Laporan Daftar Pendaftar Baru')
@section('content')

<h3 align='center'>Daftar Pendaftar Baru</h3>
<br>
<table class="cetaktable" align="center">     
                <tr>
                    <th>No Daftar</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Daftar</th>
                </tr>
                @foreach($list_pendaftar as $pendaftar)
                <tr>
                    <td>{{$pendaftar->id}}</td>
                    <td>{{$pendaftar->nama}}</td>
                    <td>{{$pendaftar->tempat_lahir}}, {{$pendaftar->tanggal_lahir}}</td>
                    <td>{{$pendaftar->alamat}}</td>
                    <td>{{$pendaftar->no_hp}}</td>
                    <td align="center">{{$pendaftar->jenis_kelamin}}</td>
                    <td align="center">{{$pendaftar->created_at}}</td>
                </tr>
                @endforeach
            </table>

@endsection