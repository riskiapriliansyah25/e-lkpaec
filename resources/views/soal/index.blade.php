@extends('layouts/adminmaster')
@section('title', 'Soal')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Paket Soal</h1>
<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm my-3" data-toggle="modal" data-target="#exampleModal">
<i class="far fa-edit"></i> Tulis Soal
</button>

@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<table class="table table-hover" id="dataTable">
    <thead>
        <tr>
            <th>ID Soal</th>
            <th>Materi</th>
            <th>Buku</th>
            <th>Jenis Soal</th>
            <th>Waktu</th>
            <th>Oleh</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @if(Auth::user()->role == 'instruktur')
        @foreach($list_soal as $soal)      
            <th>{{$soal->id}}</th>
            <td>{{$soal->materi->judul}}</td>
            <td>{{$soal->buku->nama_buku}}</td>
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
            <td>{{$soal->user->name}}</td>
            <td>
                <a href="{{url('/soal/ubah/'.$soal->id)}}" class="btn btn-success btn-sm">Ubah</a>
                <a href="{{url('/soal/details/'.$soal->id)}}" class="btn btn-primary btn-sm">Details</a>
            </td>
        </tr>
        @endforeach
      @endif
    @if(Auth::user()->role == 'admin')
        @foreach($soal_admin as $soal)      
            <th>{{$soal->id}}</th>
            @if($soal->materi->judul == null)
            <td>...</td>
            @else
            <td>{{$soal->materi->judul}}</td>
            @endif
            <td>{{$soal->buku->nama_buku}}</td>
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
            <td>{{$soal->user->name}}</td>
            <td>
                <a href="{{url('/soal/ubah/'.$soal->id)}}" class="btn btn-success btn-sm">Ubah</a>
                <a href="{{url('/soal/details/'.$soal->id)}}" class="btn btn-primary btn-sm">Details</a>
            </td>
        </tr>
        @endforeach
      @endif
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tulis Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/soal')}}" method="post">
        @csrf
        <label for="jenis">Jenis</label>
        <div class="form-group">
            <select name="jenis" id="jenis" class="form-control">
                <option value="ujian">Ujian</option>
                <option value="latihan">Latihan</option>
                <option value="tes">Tes Penempatan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="materi_id">Materi</label>
            <select name="materi_id" id="materi_id" class="form-control">
                <option value="">pilih..</option>
                @foreach($list_materi as $materi)
                <option value="{{$materi->id}}">{{$materi->judul}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="buku_id">Buku</label>
            <select name="buku_id" id="buku_id" class="form-control">
                <option value="">pilih..</option>
                @foreach($list_buku as $buku)
                <option value="{{$buku->id}}">{{$buku->nama_buku}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="waktu" name="waktu" class="form-control" id="waktu" placeholder="dalam menit">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
        
      </div>
    </div>
  </div>
</div>
<!-- endmodal -->
@endsection