@extends('layouts/elearningmaster')
@section('title', 'LKP AEC')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Learning english <span>faster</span> <br> and <span>better</span> with us</h1>
    </div>
</div>
<!-- end jumbotron -->
<div class="container">
    <div class="card mb-3 col-lg-12">
        <div class="row no-gutters">
            <div class="card-body col-md-4">
                @if(isset(Auth::user()->siswa->foto))
                <img src="{{asset('img/siswa/'.Auth::user()->siswa->foto)}}" class="card-img img-thumbnail">
                @else
                @if(Auth::user()->siswa->jenis_kelamin == 'L')
                <img src="{{asset('img/siswa/dummymale.jpg')}}" class="card-img">
                @else
                <img src="{{asset('img/siswa/dummyfemale.jpg')}}" class="card-img">
                @endif
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <form action="{{url('/e-learning/profile')}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                        <table class="table table-striped">
                            <tr>
                                <td>Nis</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="nis" value="{{Auth::user()->siswa->nis}}" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="nama" value="{{Auth::user()->siswa->nama}}"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="tempat_lahir" value="{{Auth::user()->siswa->tempat_lahir}}" >, <input type="date" class="form-control" value="{{Auth::user()->siswa->tanggal_lahir}}"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="alamat" value="{{Auth::user()->siswa->alamat}}"></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="no_hp" value="{{Auth::user()->siswa->no_hp}}"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="L" @if(Auth::user()->siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if(Auth::user()->siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                @if(isset(Auth::user()->siswa->buku_id))
                                <td>Buku</td>
                                <td>:</td>
                                <td><input type="hidden" class="form-control" name="buku_id" value="{{Auth::user()->siswa->buku_id}}" >{{Auth::user()->siswa->buku->nama_buku}}</td>
                                @else
                                <td>Buku</td>
                                <td>:</td>
                                <td><input type="hidden" class="form-control" name="buku_id" value="" >-</td>
                                @endif
                            </tr>
                            @if(isset(Auth::user()->siswa->kelas_id))
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><input type="hidden" class="form-control" name="kelas_id" value="{{Auth::user()->siswa->kelas_id}}" >{{Auth::user()->siswa->coba->nama_kelas}}</td>
                            </tr>
                            <tr>
                                <td>Instruktur</td>
                                <td>:</td>
                                <td>{{Auth::user()->siswa->coba->instruktur->nama}}</td>
                            </tr>
                                @else
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><input type="hidden" class="form-control" name="kelas_id" value="" >-</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Foto</td>
                                <td>:</td>
                                <td><input type="file" class="form-control" name="foto"></td>
                            </tr>
                        </table>
                        <button type="subtmi" class="btn btn-warning float-right mb-2">
                            <li class="fas fa-fw fa-user-edit"></li> Edit
                        </button>
                        <a href="{{url('e-learning/profile/gantipassword')}}" class="btn btn-success float-right mr-1">Ganti Password</a>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>   
</div>

@endsection
