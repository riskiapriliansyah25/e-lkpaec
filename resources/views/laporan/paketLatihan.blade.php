@extends('layouts.adminmaster')
@section('title', 'Laporan')
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
        <li class="breadcrumb-item active"><small><a href="{{url('/laporanlatihan')}}">Laporan Latihan</a></small></li>
        <li class="breadcrumb-item active"><small><a href="{{url('/laporanlatihan/detail-latihan/'.$coba->id)}}">Paket Soal</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>Daftar Siswa</small></li>
      </ol>
    </nav>
  </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($list_siswa->count())
                    @foreach($list_siswa as $siswa)
                    <?php 
                        $check = App\Jawablatihan::where('id_soal', $soallatihan->id)->where('id_user', $siswa->user_id)->first();
                     ?>
                    <tr>
                        <td>{{$siswa->nis}}</td>
                        <td>{{$siswa->nama}}</td>
                        @if($check)
                        <td><span class="badge badge-success">Telah mengerjakan</span></td>
                        @else
                        <td><span class="badge badge-warning">Belum mengerjakan</span></td>
                        @endif
                        <td>
                        @if($check)
                        <a href="{{url('laporanlatihan/detail-latihan/'.$coba->id.'/paket-latihan/'.$soallatihan->id.'/'.$siswa->id)}}" class="btn btn-primary btn-sm">Details</a>
                        <button type="submit" class="btn btn-danger btn-sm resetBtn" data-id="{{$soallatihan->id}}" data-iduser="{{$siswa->user_id}}" data-idkelas="{{$coba->id}}">Reset</button>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
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
        const kelasId = $(this).data('idkelas');
        const userId = $(this).data('iduser');
        
        $.ajax({
                  url: "{{url('/laporanlatihan/detail-latihan/reset')}}",
                  type: "POST",
                  data: {
                    soalId: soalId,
                    userId: userId
                  },
                  success: function() {
                    document.location.href = "{{url('/laporanlatihan/detail-latihan')}}/" + kelasId;
                  }
              });
    });
</script>
@endpush
