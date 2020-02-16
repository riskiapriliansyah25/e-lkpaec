@extends('layouts/adminmaster')
@section('title', 'Ubah Data Soal')
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<div class="card">
    <div class="card-header">
        Data Soal Ujian
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="buku_id">Buku</label>
                <select name="buku_id" id="buku_id" class="form-control">
                    @foreach($list_buku as $buku)
                    <option value="{{$buku->id}}" @if($buku->id == $soal->buku_id) selected @endif>{{$buku->nama_buku}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="materi_id">Materi</label>
                <select name="materi_id" id="materi_id" class="form-control">
                    @foreach($list_materi as $materi)
                    <option value="{{$materi->id}}" @if($soal->materi_id == $materi->id) selected @endif>{{$materi->judul}}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>
@endsection