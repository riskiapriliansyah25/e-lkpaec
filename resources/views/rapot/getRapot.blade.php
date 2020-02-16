@extends('layouts.adminmaster') 
@section('title', 'Rapot')
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <td width='150'>Nama</td>
                <td width= '15'>:</td>
                <td>{{$siswa->nama}}</td>
            </tr>
            <tr>
                <td width='150'>Kelas</td>
                <td width= '15'>:</td>
                <td>{{$siswa->coba->nama_kelas}}</td>
            </tr>
            <tr>
                <td width='150'>Level Buku</td>
                <td width= '15'>:</td>
                <td>{{$siswa->buku->nama_buku}}</td>
            </tr>
        </table>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Input rapot
        </button>
    </div>
</div>
@if($list_rapot->count())
@foreach($list_rapot as $rapot)
  <div class="card my-5">
    <div class="card-body">
      <h5 class="card-title">{{$rapot->kriteria->buku->nama_buku}}</h5> <a href="{{url('/rapot/exportpdf/'.$rapot->id)}}" class="btn btn-info btn-sm my-2">Pdf</a>
      <table class="table table-striped">
        <tr>
          <th width='20'>No</th>
          <th>Unit Competency</th>
          <th colspan="2">Grade</th>
          <th>Remark</th>
        </tr>
        <tr>
          <td>1</td>
          <td>{{$rapot->kriteria->kriteria_1}}</td>
          <td>Speaking</td>
          <td>{{$rapot->speaking}}</td>
          <td width="200px" rowspan="6">{{$rapot->remark}}</td>
        </tr>
        <tr>
          <td>2</td>
          <td>{{$rapot->kriteria->kriteria_2}}</td>
          <td>Listening</td>
          <td>{{$rapot->listening}}</td>
        </tr>
        <tr>
          <td>3</td>
          <td>{{$rapot->kriteria->kriteria_3}}</td>
          <td>Reading</td>
          <td>{{$rapot->reading}}</td>
        </tr>
        <tr>
          <td>4</td>
          <td>{{$rapot->kriteria->kriteria_4}}</td>
          <td>Writing </td>
          <td>{{$rapot->writing}}</td>
        </tr>
        <tr>
          <td>5</td>
          <td>{{$rapot->kriteria->kriteria_5}}</td>
          <td>Vocabulary</td>
          <td>{{$rapot->vocabulary}}</td>
        </tr>
        <tr>
          <td>6</td>
          <td>{{$rapot->kriteria->kriteria_6}}</td>
        </tr>
      </table>
      <form action="{{url('rapot/detail/'.$coba->id.'/get-rapot'.'/'.$siswa->id.'/'.$rapot->id)}}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger float-right">Delete</button>
      </form>
    </div>
  </div>
@endforeach

@else
<div class="card">
  <div class="card-body">Belum ada data</div>
</div>
@endif



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{url('/rapot/storerapot')}}" method="post">
       @csrf
       <input type="hidden" name="id_kelas" value="{{$coba->id}}">
        <input type="hidden" name="id_siswa" value="{{$siswa->id}}">
           <div class="form-group">
               <label for="id_kriteria">Level Buku</label>
               <select name="id_kriteria" id="id_kriteria" class="form-control @error('id_kriteria') is-invalid @enderror">
                   <option value="">Pilih</option>
                   @foreach($list_kriteria as $kriteria)
                    <option value="{{$kriteria->buku->id}}">{{$kriteria->buku->nama_buku}}</option>
                   @endforeach
               </select>
               @error('id_kriteria') <div class="invalid-feedback"> {{$message}}</div> @enderror
           </div>
           <div class="form-group">
             <label for="speaking">Speaking</label>
             <input type="text" name="speaking" class="form-control @error('speaking') is-invalid @enderror" value="{{old('speaking')}}">
             @error('speaking') <div class="invalid-feedback"> {{$message}}</div> @enderror
           </div>
           <div class="form-group">
             <label for="listening">Listening</label>
             <input type="text" name="listening" class="form-control @error('listening') is-invalid @enderror" value="{{old('listening')}}">
             @error('listening') <div class="invalid-feedback"> {{$message}}</div> @enderror
           </div>
           <div class="form-group">
             <label for="reading">Reading</label>
             <input type="text" name="reading" class="form-control @error('reading') is-invalid @enderror" value="{{old('reading')}}">
             @error('reading') <div class="invalid-feedback"> {{$message}}</div> @enderror
           </div>
           <div class="form-group">
             <label for="writing">Writing</label>
             <input type="text" name="writing" class="form-control @error('writing') is-invalid @enderror" value="{{old('writing')}}">
             @error('writing') <div class="invalid-feedback"> {{$message}}</div> @enderror
           </div>
           <div class="form-group">
             <label for="vocabulary">Vocabulary</label>
             <input type="text" name="vocabulary" class="form-control @error('vocabulary') is-invalid @enderror" value="{{old('vocabulary')}}">
             @error('vocabulary') <div class="invalid-feedback"> {{$message}}</div> @enderror
           </div>
           <div class="form-group">
             <label for="remark">Remark</label>
             <textarea name="remark" class="form-control @error('remark') is-invalid @enderror">{{old('remark')}}</textarea>
             @error('remark') <div class="invalid-feedback"> {{$message}}</div> @enderror
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Simpan</button>
           </div>
       </form>
      </div>
    </div>
  </div>
</div>
@endsection