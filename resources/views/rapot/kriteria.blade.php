@extends('layouts.adminmaster') 
@section('title', 'Rapot')
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah data
</button>

<div class="col-md-9 my-5">
    <div class="card">
        <div class="card-header">
            Daftar Kriteria
        </div>
        <div class="card-body">
            
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Level Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($list_kriteria->count())
                        @foreach($list_kriteria as $kriteria)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$kriteria->buku->nama_buku}}</td>
                            <td>
                                <a href="{{url('/rapot/kriteria/'.$kriteria->id)}}" class="btn btn-success btn-sm">Detail</a>
                                <form action="{{url('/rapot/kriteria/'.$kriteria->id)}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
        
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/rapot/kriteria')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="id_buku">Level Buku</label>
                <select name="id_buku" id="id_buku" class="form-control @error('id_buku') is-invalid @enderror">
                    <option value="">Pilih</option>
                    @foreach($list_buku as $buku)
                    <option value="{{$buku->id}}">{{$buku->nama_buku}}</option>
                    @endforeach
                </select>
                @error('id_buku') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kriteria_1">Kriteria 1</label>
                <input type="text" name="kriteria_1" class="form-control @error('kriteria_1') is-invalid @enderror">
                @error('kriteria_1') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kriteria_2">Kriteria 2</label>
                <input type="text" name="kriteria_2" class="form-control">
            </div>
            <div class="form-group">
                <label for="kriteria_3">Kriteria 3</label>
                <input type="text" name="kriteria_3" class="form-control">
            </div>
            <div class="form-group">
                <label for="kriteria_4">Kriteria 4</label>
                <input type="text" name="kriteria_4" class="form-control">
            </div>
            <div class="form-group">
                <label for="kriteria_5">Kriteria 5</label>
                <input type="text" name="kriteria_5" class="form-control">
            </div>
            <div class="form-group">
                <label for="kriteria_6">Kriteria 6</label>
                <input type="text" name="kriteria_6" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection