@extends('layouts.adminmaster') 
@section('title', $kriteria->buku->nama_buku)
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<div class="col-md-9">
    <div class="card">
        <div class="card-header">Kriteria</div>
        <div class="card-body">
            <form action="{{url('/rapot/kriteria/'.$kriteria->id)}}" method="post">
                @method('patch')
                @csrf
                <div class="form-group row">
                    <label for="id_buku" class="col-sm-2 col-form-label">Level buku</label>
                    <div class="col-sm-10">
                    <select name="id_buku" id="id_buku" class="form-control">
                        <option value="">Pilih</option>
                        @foreach($list_buku as $buku)
                        <option value="{{$buku->id}}" @if($buku->id == $kriteria->id_buku) selected @endif>{{$buku->nama_buku}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kriteria_1" class="col-sm-2 col-form-label">Kriteria 1</label>
                    <div class="col-sm-10">
                    <input type="text" name="kriteria_1" class="form-control" id="kriteria_1" value="{{$kriteria->kriteria_1}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kriteria_1" class="col-sm-2 col-form-label">Kriteria 2</label>
                    <div class="col-sm-10">
                    <input type="text" name="kriteria_2" class="form-control" id="kriteria_2" value="{{$kriteria->kriteria_2}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kriteria_3" class="col-sm-2 col-form-label">Kriteria 3</label>
                    <div class="col-sm-10">
                    <input type="text" name="kriteria_3" class="form-control" id="kriteria_3" value="{{$kriteria->kriteria_3}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kriteria_4" class="col-sm-2 col-form-label">Kriteria 4</label>
                    <div class="col-sm-10">
                    <input type="text" name="kriteria_4" class="form-control" id="kriteria_4" value="{{$kriteria->kriteria_4}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kriteria_5" class="col-sm-2 col-form-label">Kriteria 5</label>
                    <div class="col-sm-10">
                    <input type="text" name="kriteria_5" class="form-control" id="kriteria_5" value="{{$kriteria->kriteria_5}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kriteria_6" class="col-sm-2 col-form-label">Kriteria 6</label>
                    <div class="col-sm-10">
                    <input type="text" name="kriteria_6" class="form-control" id="kriteria_6" value="{{$kriteria->kriteria_6}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-warning  float-right">Ubah</button>
            </form>
        </div>
    </div>
</div>

@endsection