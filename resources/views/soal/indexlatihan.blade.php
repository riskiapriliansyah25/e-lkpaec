@extends('layouts/adminmaster')
@section('title', 'Soal Latihan')
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
        <li class="breadcrumb-item active" aria-current="page"><small>Soal Latihan</small></li>
      </ol>
    </nav>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
    <i class="far fa-edit"></i> Tulis Soal
</button>
<hr>

@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif

<div class="card border-left-info">
    <div class="card-body">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>ID Soal</th>
                    <th>Buku</th>
                    <th>Materi</th>
                    <th>Jenis Soal</th>
                    <th>Waktu</th>
                    <th>Jumlah Soal</th>
                    <th>Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(Auth::user()->role == 'admin')
                    @if($list_latihan->count())
                        @foreach($list_latihan as $soal)
                            <th>{{$soal->id}}</th>
                            <td>{{$soal->buku->nama_buku}}</td>
                            <td>{{$soal->materi->judul}}</td>
                            @if($soal->jenis == 'latihan')
                                <td><span class="badge badge-success">Latihan</span></td>
                            @endif
                            @if($soal->jenis == 'ujian')
                                <td><span class="badge badge-primary">Ujian</span></td>
                            @endif
                            @if($soal->jenis == 'tes')
                                <td><span class="badge badge-warning">Tes Penempatan</span></td>
                            @endif
                            <td>{{$soal->waktu}} Menit</td>
                            <td>{{$soal->detailsoallatihan->count()}}</td>
                            <td>{{$soal->user->name}}</td>
                            <td>
                                <a href="{{url('/soal-latihan/ubah/'.$soal->id)}}" class="btn btn-success btn-sm">Ubah</a>
                                <a href="{{url('/soal-latihan/details/'.$soal->id)}}" class="btn btn-primary btn-sm">Details</a>
                                <form action="{{url('/soal-latihan/'.$soal->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
                @if(Auth::user()->role == 'instruktur')
                    @if($soal_instruktur->count())
                        @foreach($soal_instruktur as $soal)
                            <th>{{$soal->id}}</th>
                            <td>{{$soal->buku->nama_buku}}</td>
                            <td>{{$soal->materi->judul}}</td>
                            @if($soal->jenis == 'latihan')
                                <td><span class="badge badge-success">Latihan</span></td>
                            @endif
                            @if($soal->jenis == 'ujian')
                                <td><span class="badge badge-primary">Ujian</span></td>
                            @endif
                            @if($soal->jenis == 'tes')
                                <td><span class="badge badge-warning">Tes Penempatan</span></td>
                            @endif
                            <td>{{$soal->waktu}} Menit</td>
                            <td>{{$soal->detailsoallatihan->count()}}</td>
                            <td>{{$soal->user->name}}</td>
                            <td>
                                <a href="{{url('/soal-latihan/details/'.$soal->id)}}" class="btn btn-primary btn-sm">Details</a>
                                <form action="{{url('/soal-latihan/'.$soal->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tulis Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/soal-latihan')}}" method="post">
                    @csrf
                    <label for="jenis">Jenis</label>
                    <div class="form-group">
                        <select name="jenis" id="jenis" class="form-control  @error('jenis') is-invalid @enderror">
                            <option value="latihan">Latihan</option>
                        </select>
                        @error('jenis') <div class="invalid-feedback"> {{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="buku_id">Buku</label>
                        <select name="buku_id" id="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                            <option value="">pilih..</option>
                            @foreach($list_buku as $buku)
                            <option value="{{$buku->id}}">{{$buku->nama_buku}}</option>
                            @endforeach
                        </select>
                        @error('buku_id') <div class="invalid-feedback"> {{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="materi_id">Materi</label>
                        <select name="materi_id" id="materi_id" class="form-control">
                            <option value="">pilih..</option>
                            @foreach($list_materi as $materi)
                            <option value="{{$materi->id}}">{{$materi->judul}}</option>
                            @endforeach
                        </select>
                        @error('materi_id') <div class="invalid-feedback"> {{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="waktu" name="waktu" class="form-control @error('waktu') is-invalid @enderror" id="waktu" placeholder="dalam menit">
                        @error('waktu') <div class="invalid-feedback"> {{$message}}</div> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- endmodal -->


@endsection
