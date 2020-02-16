@extends('layouts/adminmaster')
@section('title', 'Laporan Ujian')
@section('content')
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><small><a href="{{url('/admin')}}"><i class="fas fa-home"></i> Home</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Laporan Ujian</small></li>
      </ol>
    </nav>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                Laporan Hasil Ujian
            </div>
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Paket Soal</th>
                            <th>Jenis</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_siswa as $siswa)
                        <tr>
                            <td>{{$siswa->user->siswa->nis}}</td>
                            <td>{{$siswa->user->siswa->nama}}</td>
                            @if(isset($siswa->user->siswa->kelas_id))
                            <td>{{$siswa->user->siswa->coba->nama_kelas}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{$siswa->soal->buku->nama_buku}}</td>
                            <td>{{$siswa->soal->jenis}}</td>
                            <td>{{$siswa->nilai}}</td>
                            <td>
                                <a href="{{url('/laporanujian/'.$siswa->user->siswa->id.'/'.$siswa->soal->id)}}" class="btn btn-success btn-sm">Detail</a>
                                <button type="submit" class="btn btn-danger btn-sm resetBtn" data-id="{{$siswa->id_soal}}" data-iduser="{{$siswa->id_user}}">Reset</button>
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

    $(".resetBtn").on('click', function(){
        const soalId = $(this).data('id');
        const userId = $(this).data('iduser');
        
        $.ajax({
                  url: "{{url('/laporanujian')}}",
                  type: "POST",
                  data: {
                    soalId: soalId,
                    userId: userId
                  },
                  success: function() {
                    document.location.href = "{{url('/laporanujian')}}";
                  }
              });
    });
</script>
@endpush