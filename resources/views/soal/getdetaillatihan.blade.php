@extends('layouts.adminmaster')
@section('title', 'Detail Soal Latihan')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('soal-latihan')}}">Soal Latihan</a></li>
    <li class="breadcrumb-item"><a href="{{url('soal-latihan/details/'.$soallatihan->id)}}">Detail Soal Latihan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
        <div class="card card-body">
                <form action="{{url('/soal-latihan/details/data-soallatihan/'.$soallatihan->id.'/'.$detailsoallatihan->id)}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="soal">Soal</label>
                    <textarea name="soal" id="editor1" cols="30" rows="3" class="form-control">{{$detailsoallatihan->soal}}</textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1' );
                    </script>
                </div>
                <div class="form-group">
                    <label for="audio">Audio</label>
                    <input type="file" name="audio" id="audio" class="form-control">
                    @error('audio') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    @error('gambar') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="pila">Pilihan A</label>
                    <textarea name="pila" id="pila" cols="30" rows="3" class="form-control @error('pila') is-invalid @enderror">{{$detailsoallatihan->pila}}</textarea>
                    @error('pila') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="pilb">Pilihan B</label>
                    <textarea name="pilb" id="pilb" cols="30" rows="3" class="form-control @error('pilb') is-invalid @enderror">{{$detailsoallatihan->pilb}}</textarea>
                    @error('pilb') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="pilc">Pilihan C</label>
                    <textarea name="pilc" id="pilc" cols="30" rows="3" class="form-control @error('pilc') is-invalid @enderror">{{$detailsoallatihan->pilc}}</textarea>
                    @error('pilc') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="pild">Pilihan D</label>
                    <textarea name="pild" id="pild" cols="30" rows="3" class="form-control @error('pild') is-invalid @enderror">{{$detailsoallatihan->pild}}</textarea>
                    @error('pild') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="pile">Pilihan E</label>
                    <textarea name="pile" id="pile" cols="30" rows="3" class="form-control">{{$detailsoallatihan->pile}}</textarea>
                </div>
                <div class="form-group">
                    <label for="kunci">Kunci: </label>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kunci" id="inlineRadio1" value="A" @if($detailsoallatihan->kunci == "A") checked @endif>
                    <label class="form-check-label" for="inlineRadio1">A</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kunci" id="inlineRadio2" value="B" @if($detailsoallatihan->kunci == "B") checked @endif>
                    <label class="form-check-label" for="inlineRadio2">B</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kunci" id="inlineRadio3" value="C" @if($detailsoallatihan->kunci == "C") checked @endif>
                    <label class="form-check-label" for="inlineRadio3">C</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kunci" id="inlineRadio4" value="D" @if($detailsoallatihan->kunci == "D") checked @endif>
                    <label class="form-check-label" for="inlineRadio4">D</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kunci" id="inlineRadio5" value="E" @if($detailsoallatihan->kunci == "E") checked @endif>
                    <label class="form-check-label" for="inlineRadio5">E</label>
                    </div>
                    @error('kunci') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="penjelasan">Penjelasan</label>
                    <textarea name="penjelasan" id="penjelasan" rows="10" class="form-control">{{$detailsoallatihan->penjelasan}}</textarea>
                </div>
                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{$detailsoallatihan->score}}">
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio6" value="Y" @if($detailsoallatihan->status == "Y") checked @endif>
                        <label class="form-check-label" for="inlineRadio6">Tampil</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio7" value="N" @if($detailsoallatihan->status == "N") checked @endif>
                        <label class="form-check-label" for="inlineRadio7">Tidak Tampil</label>
                    </div>
                    @error('status') <div class="invalid-feedback"> {{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
                </form>
        </div>
@endsection
@push('scripts')
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
@endpush