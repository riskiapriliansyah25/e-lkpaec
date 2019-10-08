@extends('layouts/adminmaster')
@section('title', 'Detail Soal')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Detail Soal</h1>
<hr>
<form action="{{url('/soal/details/data-soal/'.$detailsoal->id)}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="soal">Soal</label>
        <textarea name="soal" id="soal" cols="30" rows="3" class="form-control">{{$detailsoal->soal}}</textarea>
    </div>
    <div class="form-group">
        <label for="audio">Soal Audio</label>
        <input type="file" name="audio" class="form-control">
    </div>
    <div class="form-group">
        <label for="pila">Pilihan A</label>
        <textarea name="pila" id="pila" cols="30" rows="2" class="form-control">{{$detailsoal->pila}}</textarea>
    </div>
    <div class="form-group">
        <label for="pilb">Pilihan B</label>
        <textarea name="pilb" id="pilb" cols="30" rows="2" class="form-control">{{$detailsoal->pilb}}</textarea>
    </div>
    <div class="form-group">
        <label for="pilc">Pilihan C</label>
        <textarea name="pilc" id="pilc" cols="30" rows="2" class="form-control">{{$detailsoal->pilc}}</textarea>
    </div>
    <div class="form-group">
        <label for="pild">Pilihan D</label>
        <textarea name="pild" id="pild" cols="30" rows="2" class="form-control">{{$detailsoal->pild}}</textarea>
    </div>
    <div class="form-group">
        <label for="">Kunci: </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio1" value="A" @if($detailsoal->kunci == 'A') checked @endif>
            <label class="form-check-label" for="inlineRadio1">A</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio2" value="B" @if($detailsoal->kunci == 'B') checked @endif>
            <label class="form-check-label" for="inlineRadio2">B</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio3" value="C" @if($detailsoal->kunci == 'C') checked @endif>
            <label class="form-check-label" for="inlineRadio3">C</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio4" value="D" @if($detailsoal->kunci == 'D') checked @endif>
            <label class="form-check-label" for="inlineRadio4">A</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>
    <button type="button" class="btn btn-danger" onclick="self.history.back()">Kembali</button>
</form>

@endsection