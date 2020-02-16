@extends('layouts/laporanmaster')
@section('title', 'Laporan Daftar Instruktur')
@section('content')

<h3 align='center'>Daftar Instruktur</h3>
<br>
<table class="cetaktable" align="center">     
                <tr>
                    <th>#</th>
                    <th>NII</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jabatan</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                </tr>
                @foreach($list_instruktur as $instruktur)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$instruktur->nii}}</td>
                    <td>{{$instruktur->nama}}</td>
                    <td>{{$instruktur->tempat_lahir}}, {{$instruktur->tanggal_lahir}}</td>
                    <td>{{$instruktur->jabatan}}</td>
                    <td>{{$instruktur->no_hp}}</td>
                    <td align="center">{{$instruktur->jenis_kelamin}}</td>
                </tr>
                @endforeach
            </table>

@endsection