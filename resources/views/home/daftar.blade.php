<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <title>Pendaftaran</title>
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-green fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Active English Course</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="{{url('/')}}">Home</a>
                <a class="nav-item nav-link" href="#">Tentang</a>
                <a class="nav-item btn btn-primary tombol" href="{{url('/daftar')}}">Daftar</a>
            </div>
        </div>
    </div>
</nav>
<!-- end navbar -->

<!-- main -->
<div class="container">
    <div class="row justify-content-center tinggi-card">
        <div class="col-md-8">
            @if(session('sukses'))
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>{{session('sukses')}}</p>
            <hr>
            <p class="mb-0">Kunjungi kami di Jalan Awang Long Senopati RT.01 NO.19 Kel-Sukarame Kec-Tenggarong Kaltim 75515 Telp. 0541-661781</p>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5>Pendaftaran</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('/daftar')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                             @error('nama') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}">
                             @error('tempat_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir')}}">
                             @error('tanggal_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                             @error('email') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}">
                             @error('alamat') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{old('no_hp')}}">
                             @error('no_hp') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">Pilih..</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis_kelamin') <div class="invalid-feedback"> {{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Daftar</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- endmain -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>