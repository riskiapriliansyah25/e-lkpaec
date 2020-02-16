@extends('layouts.adminmaster') 
@section('title', $title)
@section('content')
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i> Home</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Daftar Siswa</small></li>
      </ol>
    </nav>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-1 btn-sm" data-toggle="modal" data-target="#exampleModal">
  <li class="fas fa-fw fa-plus"></li>
</button>
<!-- End Button -->
<!-- Button trigger modal -->
<a href="{{url('/siswa/exportpdf')}}" class="btn btn-success btn-sm">
 PDF
</a>
<!-- End Button -->

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
<hr>
<div class="card border-left-info">
  <div class="card-body">
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">NIS</th>
          <th scope="col">Nama</th>
          <th scope="col">No HP</th>
          <th scope="col">Kelas</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach($list_siswa as $siswa)
        <tr>
          <th scope="row">{{$siswa->nis}}</th>
          <td><a href="{{url('/siswa/'.$siswa->id)}}">{{$siswa->nama}}</a></td>
          <td>{{$siswa->no_hp}}</td>
          @if($siswa->kelas_id == null)
          <td><span class="badge badge-danger">Belum ada kelas</span></td>
          @else
          <td>{{$siswa->coba->nama_kelas}}</td>
          @endif
          <td>
            @if($siswa->status == 1)
            <span class="badge badge-primary">Aktif</span> 
            @else
            <span class="badge badge-danger">Tidak Aktif</span> 
            @endif
          </td>
          <td>
              <a href="{{url('/siswa/'.$siswa->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{url('/siswa/'.$siswa->id)}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<hr>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url ('/siswa')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" value="{{$nis_siswa}}" readonly>
                @error('nis') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                @error('nama') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}">
                @error('tempat_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tempat_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir')}}">
                @error('tanggal_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}">
                @error('alamat') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{old('no_hp')}}">
                @error('no_hp') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">Pilih...</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                @error('jenis_kelamin') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="buku_id">Buku</label>
                <select name="buku_id" id="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                <option value="">Pilih..</option>
                @foreach($list_buku as $buku)
                    <option value="{{$buku->id}}">{{$buku->nama_buku}}</option>
                  @endforeach
                </select>
                @error('buku_id') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                <option value="">Pilih..</option>
                @foreach($list_kelas as $kelas)
                    <option value="{{$kelas->id}}">{{$kelas->nama_kelas}}: {{$kelas->instruktur->nama}}</option>
                  @endforeach
                </select>
                @error('kelas_id') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">Aktif</label>
              </div>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
              <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
      </div>
      
    </div>
  </div>
</div>


@endsection


