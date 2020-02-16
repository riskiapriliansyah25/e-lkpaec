@extends('layouts.adminmaster') 
@section('title', 'Pembayaran')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('/pembayaran/show/'.$siswa->id)}}" method="post">
                @csrf
                    <table>
                        <tr>
                            <td width='100'>Nama</td>
                            <td width='20'>:</td>
                            <td>{{$siswa->nama}}</td>
                        </tr>
                        <tr>
                            <td width='100'>Alamat</td>
                            <td width='20'>:</td>
                            <td>{{$siswa->alamat}}</td>
                        </tr>
                        <tr>
                            <td width='100'>No HP</td>
                            <td width='20'>:</td>
                            <td>{{$siswa->no_hp}}</td>
                        </tr>
                        <tr>
                            <td width='100'>Paket</td>
                            <td width='20'>:</td>
                            <td>
                                <select name="id_paket" id="id_paket" class="form-control @error('id_paket') is-invalid @enderror">
                                    <option value="">Pilih</option>
                                    @foreach($list_paket as $paket)
                                    <option value="{{$paket->id}}|{{$paket->harga}}">{{$paket->nama_paket}}- Rp.{{$paket->harga}}</option>
                                    @endforeach
                                </select>
                                @error('id_paket') <div class="invalid-feedback"> {{$message}}</div> @enderror
                            </td>
                        </tr>
                        <tr>
                            <td width='100'>Keterangan</td>
                            <td width='20'>:</td>
                            <td>
                                <select name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                                    <option value="">Pilih</option>
                                    <option value="1">Lunas</option>
                                    <option value="0">Belum Lunas</option>
                                </select>
                                @error('keterangan') <div class="invalid-feedback"> {{$message}}</div> @enderror
                            </td>
                        </tr>
                        <tr>
                            <td width='100'>Tanggal Bayar</td>
                            <td width='20'>:</td>
                            <td>
                               <input type="date" name="tgl_bayar" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if($list_pembayaran->count())
@foreach($list_pembayaran as $pembayaran)
<div class="card mt-4">
    <div class="card-header">
        Invoice
        <form action="{{url('/pembayaran/show/'.$pembayaran->id.'/'.$siswa->id)}}" method="post" class="d-inline float-right">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
    <div class="card-body">
        <a href="{{url('/pembayaran/exportpdf/'.$pembayaran->id)}}" class="btn btn-success btn-sm mb-3">PDF</a>
        
        <table>
            <tr>
                <td width='100'>Tanggal</td>
                <td width='20'>:</td>
                <td>{{$pembayaran->tgl_bayar}}</td>
            </tr>
            <tr>
                <td width='100'>Nama</td>
                <td width='20'>:</td>
                <td>{{$siswa->nama}}</td>
            </tr>
            <tr>
                <td width='100'>Alamat</td>
                <td width='20'>:</td>
                <td>{{$siswa->alamat}}</td>
            </tr>
            <tr>
                <td width='100'>No HP</td>
                <td width='20'>:</td>
                <td>{{$siswa->no_hp}}</td>
            </tr>
            <tr>
                <td width='100'>Paket</td>
                <td width='20'>:</td>
                <td>{{$pembayaran->paket->nama_paket}}</td>
            </tr>
            <tr>
                <td width='100'>Harga</td>
                <td width='20'>:</td>
                <td>{{$pembayaran->total}}</td>
            </tr>
            <tr>
                <td width='100'>Keterangan</td>
                <td width='20'>:</td>
                @if($pembayaran->keterangan == 1)
                <td>Lunas</td>
                @else
                <td>Belum Lunas</td>
                @endif
            </tr>
        </table>
    </div>
</div>
@endforeach
@else
<div class="card mt-4">
    <div class="card-body">
        Belum ada data
    </div>
</div>
@endif


@endsection


