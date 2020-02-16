@extends('layouts/laporanmaster')
@section('title', 'Laporan Daftar Buku')
@section('content')

<h3 align='center'>Daftar Buku</h3>
<br>
<table class="cetaktable">     
                <tr>
                    <th>#</th>
                    <th>Buku</th>
                </tr>
                @foreach($list_buku as $buku)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$buku->nama_buku}}</td>
                </tr>
                @endforeach
            </table>

@endsection