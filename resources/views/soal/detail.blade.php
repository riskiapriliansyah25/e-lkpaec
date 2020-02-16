@extends('layouts/adminmaster')
@section('title', 'Soal Ujian')
@section('content')
<!-- Page Heading -->
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i> Home</a></small></li>
        <li class="breadcrumb-item active"><small><a href="{{url('/soal')}}">Soal Ujian</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Detail</small></li>
      </ol>
    </nav>
  </div>
</div>

<hr>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif
<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi</h5>
                        <hr>
                        <h6 class="card-subtitle mb-2 text-muted">{{$soal->buku->nama_buku}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Paket id: {{$soal->id}}</h6>
                        <p class="card-text">
                            @if($soal->jenis == 'latihan')
                            <td><span class="badge badge-success">Latihan</span></td>
                            @endif
                            @if($soal->jenis == 'ujian')
                            <td><span class="badge badge-primary">Ujian</span></td>
                            @endif
                            @if($soal->jenis == 'tes')
                            <td><span class="badge badge-warning">Tes Penempatan</span></td>
                            @endif
                        </p>
                        <p class="card-text">{{$soal->waktu}} Menit</p>
                        <p class="card-text">{{$soal->user->name}}</p>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <a href="{{url('/soal/details/distribusi/'.$soal->id)}}" class="btn btn-primary btn-sm">Distribusi Soal</a>
                        </div>
                    </div>
                </div>   
            </div>
        </div>    
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Soal</h5>
                <hr>
                <!-- Button trigger modal -->
                <button class="btn btn-primary btn-sm my-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="far fa-edit"></i> Tulis Soal
                </button>

                <!-- Modal -->
                <div class="collapse mb-5" id="collapseExample">
                    <div class="card card-body">
                        <form action="{{url('/soal/details/'.$soal->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="soal">Soal ke-<span class="badge badge-secondary">{{$jumlah}}</span></label>
                            <textarea name="soal" id="editor1" cols="30" rows="3" class="form-control">{{old('soal')}}</textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="audio">Audio</label>
                            <input type="file" name="audio" id="audio" class="form-control" >
                            @error('audio') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                            @error('gambar') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="pila">Pilihan A</label>
                            <textarea name="pila" id="pila" cols="30" rows="3" class="form-control @error('pila') is-invalid @enderror">{{old('pila')}}</textarea>
                            @error('pila') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="pilb">Pilihan B</label>
                            <textarea name="pilb" id="pilb" cols="30" rows="3" class="form-control @error('pilb') is-invalid @enderror">{{old('pilb')}}</textarea>
                            @error('pilb') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="pilc">Pilihan C</label>
                            <textarea name="pilc" id="pilc" cols="30" rows="3" class="form-control @error('pilc') is-invalid @enderror">{{old('pilc')}}</textarea>
                            @error('pilc') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="pild">Pilihan D</label>
                            <textarea name="pild" id="pild" cols="30" rows="3" class="form-control @error('pild') is-invalid @enderror">{{old('pild')}}</textarea>
                            @error('pild') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="pile">Pilihan E</label>
                            <textarea name="pile" id="pile" cols="30" rows="3" class="form-control">{{old('pile')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kunci">Kunci: </label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio1" value="A">
                            <label class="form-check-label" for="inlineRadio1">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio2" value="B">
                            <label class="form-check-label" for="inlineRadio2">B</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio3" value="C">
                            <label class="form-check-label" for="inlineRadio3">C</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio4" value="D">
                            <label class="form-check-label" for="inlineRadio4">D</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kunci" id="inlineRadio5" value="E">
                            <label class="form-check-label" for="inlineRadio5">E</label>
                            </div>
                            @error('kunci') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="score">Score</label>
                            <input type="text" class="form-control @error('score') is-invalid @enderror" name="score">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio6" value="Y">
                                <label class="form-check-label" for="inlineRadio6">Tampil</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio7" value="N">
                                <label class="form-check-label" for="inlineRadio7">Tidak Tampil</label>
                            </div>
                            @error('status') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- end modal -->
                <!-- endbutton -->
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>Soal</th>
                            <th>Audio</th>
                            <th>Gambar</th>
                            <th>Kunci</th>
                            <th>Score</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_soal as $detail)
                        <tr>
                            <td>{!! $detail->soal !!}</td>
                            @if(isset($detail->audio))
                            <td>Ada</td>
                            @else
                            <td>Kosong</td>
                            @endif
                            @if(isset($detail->gambar))
                            <td>Ada</td>
                            @else
                            <td>Kosong</td>
                            @endif
                            <td>{!! $detail->kunci !!}</td>
                            <td>{!! $detail->score !!}</td>
                            @if($detail->status == 'Y')
                                <td><span class="badge badge-success">Tampil</span></td>
                            @else
                                <td><span class="badge badge-danger">Tidak Tampil</span></td>
                            @endif
                            <td>
                                <a href="{{url('/soal/details/data-soal/'.$soal->id.'/'.$detail->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                <form action="{{url('/soal/details/'.$soal->id.'/'.$detail->id)}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
        <!-- Distribusi Soal -->     
        <div class="card mt-5">
            
        </div>       
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>


@endpush