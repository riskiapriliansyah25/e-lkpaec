@extends('layouts/laporanmaster')
@section('title', 'Laporan Daftar Siswa')
@section('content')
    <h3 align="center">Daftar Siswa</h3>
    <br>
            <table class="cetaktable" align="center">     
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                </tr>
                @foreach($list_siswa as $siswa)
                <tr>
                    <td align="center">{{$loop->iteration}}</td>
                    <td>{{$siswa->nis}}</td>
                    <td>{{$siswa->nama}}</td>
                    <td>{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</td>
                    <td>{{$siswa->alamat}}</td>
                    <td>{{$siswa->no_hp}}</td>
                    <td align="center">{{$siswa->jenis_kelamin}}</td>
                    <td align="center">
                        @if($siswa->status == 1)
                        Aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
@endsection