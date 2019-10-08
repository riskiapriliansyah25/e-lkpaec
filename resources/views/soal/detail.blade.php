@extends('layouts/adminmaster')
@section('title', 'Soal')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Soal</h1>
<hr>

<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi</h5>
                        <hr>
                        <h6 class="card-subtitle mb-2 text-muted">{{$soal->materi->judul}}</h6>
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
                </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                    @if(Auth::user()->role == 'instruktur')
                    <h5 class="card-title">Kelas Yang Diajar</h5>
                                @foreach($kelas_ajar as $ajar)
                               {{$ajar->nama_kelas}} 
                               <form action="{{url('/soal/details/'.$soal->id.'/distribusi')}}" method="post">
                               @csrf
                               <input type="text" name="kelas_id" value="{{$ajar->id}}" hidden>
                               <button type="submit" class="badge badge-primary float-right">Aktifkan</button>
                                </form>
                               
                                @endforeach
                    @endif
                    @if(Auth::user()->role == 'admin')
                        <h5 class="card-title">Distribusi Soal</h5>
                        <ul class="list-group list-group-flush">
                            @foreach($list_kelas as $ajar)
                            <li class="list-group-item">
                            <form action="{{url('/soal/details/'.$soal->id.'/distribusi')}}" method="post" class="d-inline">
                            @csrf
                            <input type="text" name="kelas_id" value="{{$ajar->id}}" hidden>
                            <button type="submit" class="badge badge-primary"><i class="fas fa-fw fa-plus"></i>{{$ajar->nama_kelas}}</button>
                            </form>
</li>
                            @endforeach
                        </ul>
                    @endif
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
                        <form action="{{url('/soal/details/'.$soal->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="soal">Soal</label>
                            <textarea name="soal" id="soal" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pila">Pilihan A</label>
                            <textarea name="pila" id="pila" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pilb">Pilihan B</label>
                            <textarea name="pilb" id="pilb" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pilc">Pilihan C</label>
                            <textarea name="pilc" id="pilc" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pild">Pilihan D</label>
                            <textarea name="pild" id="pild" cols="30" rows="3" class="form-control"></textarea>
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
                        </div>
                        <div class="form-group">
                            <label for="score">Score</label>
                            <input type="text" class="form-control" name="score">
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
                            <th>Kunci</th>
                            <th>Score</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_soal as $detail)
                        <tr>
                            <td>{!! $detail->soal !!}</td>
                            <td>{!! $detail->kunci !!}</td>
                            <td>{!! $detail->score !!}</td>
                            <td>
                                <a href="{{url('/soal/details/data-soal/'.$detail->id)}}" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
        <!-- Distribusi Soal -->     
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Distribusi Soal</h5>
                <hr>
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>Materi</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($distribusi_soal as $soal)
                        <tr>
                            <td>{{ $soal->soal->materi->judul }}</td>
                            <td>{{ $soal->kelas->nama_kelas }}</td>
                            <td>
                                <form action="{{url('/soal/details/'.$soal->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="subtmi" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>       
    </div>
</div>

@endsection