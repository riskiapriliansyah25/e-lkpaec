@extends('layouts/adminmaster')
@section('title', 'Soal')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Soal</h1>
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
                </div>   
            </div>
        </div>    
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                Distribusi Soal
            </div>
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_siswa as $siswa)
                        <tr>
                            <td>{{$siswa->nis}}</td>
                            <td>{{$siswa->nama}}</td>
                            @if($siswa->kelas_id == null)
                            <td><span class="badge badge-danger">Belum ada kelas</span></td>
                            @else
                            <td>{{$siswa->coba->nama_kelas}}</td>
                            @endif
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm kirimdata" data-idsoal="{{$soal->id}}" data-idsiswa="{{$siswa->id}}" data-iduser="{{Auth::user()->id}}">Distribusi</button>
                            </td> 
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">Tabel Distribusi</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nis</th>
                            <th>Siswa</th>
                            <th>Soal</th>
                            <th>Jenis Soal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_distribusi as $distribusi)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$distribusi->siswa->nis}}</td>
                            <td>{{$distribusi->siswa->nama}}</td>
                            <td>{{$distribusi->soal->buku->nama_buku}}</td>
                            <td>
                                @if($distribusi->soal->jenis == "ujian")
                                <span class="badge badge-primary">Ujian</span>
                                @else
                                <span class="badge badge-success">Tes</span>
                                @endif
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger btn-sm deleteDistribusi" data-id="{{$distribusi->id}}"  data-idsoal="{{$soal->id}}">Delete</button>
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
@push('script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

$('.kirimdata').on('click', function(){
          const soalId = $(this).data('idsoal');
          const siswaId = $(this).data('idsiswa');
          const userId = $(this).data('iduser');
          /* console.log(soalId);
          console.log(kelasId);
          console.log(userId); */

          $.ajax({
              url: "{{url('/soal/details/distribusi')}}",
              type: "POST",
              data: {
                soalId: soalId,
                siswaId: siswaId,
                userId: userId
              },
              success: function() {
                document.location.href = "{{url('/soal/details/distribusi')}}/" + soalId;
              }
          });
        });
$(".deleteDistribusi").on('click', function(){
    const distId = $(this).data('id');
    const soalId = $(this).data('idsoal');
    
    $.ajax({
              url: "{{url('/soal/deleteDistribusi')}}",
              type: "POST",
              data: {
                distId: distId,
                soalId: soalId
              },
              success: function() {
                document.location.href = "{{url('/soal/details/distribusi')}}/" + soalId;
              }
          });
});

</script>
@endpush