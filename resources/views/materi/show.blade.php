@extends('layouts.adminmaster') 
@section('title', $materi->judul)
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Distribusi Materi
            </div>
            <div class="card-body">
                @if($list_kelas->count())
                    @foreach($list_kelas as $kelas)
                    <button type="submit" class="btn btn-primary btn-sm mb-3 kirimdata" data-id="{{$materi->id}}" data-idkelas="{{$kelas->id}}" data-iduser="{{Auth::user()->id}}"><i class="fas fa-fw fa-plus"></i>{{$kelas->nama_kelas}}</button>
                    @endforeach 
                @else
                <span>Belum ada kelas</span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">{{$materi->judul}}</h5>
               <a href="{{asset('materi/'.$materi->materi)}}" download>{{$materi->materi}}</a><br>
                <div class="badge badge-primary">{{$materi->user->name}}</div>
                <div class="badge badge-success">{{$materi->buku->nama_buku}}</div>
                <div class="row my-5">
                    <div class="col-md">
                        {!! $materi->deskripsi !!}
                    </div>
                </div> 
            </div>
        </div>
        <div class="card my-5">
            <div class="card-header">
                Distribusi Materi Tabel
            </div>
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Materi</th>
                            <th>Kelas</th>
                            <th>Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_distribusi as $distribusi)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$distribusi->materi->judul}}</td>
                            <td>{{$distribusi->kelas->nama_kelas}}</td>
                            <td>{{$distribusi->user->name}}</td>
                            <td>
                            <button type="submit" class="btn btn-danger btn-sm deleteDistribusi" data-id="{{$distribusi->id}}"  data-idmateri="{{$materi->id}}">Delete</button>
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
    const materiId = $(this).data('id');
    const kelasId = $(this).data('idkelas');
    const userId = $(this).data('iduser');
          console.log(materiId);
          console.log(kelasId);
          console.log(userId);

          $.ajax({
              url: "{{url('/materi/distribusi')}}",
              type: "POST",
              data: {
                materiId: materiId,
                kelasId: kelasId,
                userId: userId
              },
              success: function() {
                document.location.href = "{{url('/materi')}}/" + materiId;
              }
          });
        });
$(".deleteDistribusi").on('click', function(){
    const distId = $(this).data('id');
    const materiId = $(this).data('idmateri');
    
    $.ajax({
              url: "{{url('/materi/deleteDistribusi')}}",
              type: "POST",
              data: {
                distId: distId,
                materiId: materiId
              },
              success: function() {
                document.location.href = "{{url('/materi')}}/" + materiId;
              }
          });
});

</script>
@endpush


