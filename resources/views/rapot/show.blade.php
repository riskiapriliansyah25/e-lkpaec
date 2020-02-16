@extends('layouts.adminmaster') 
@section('title', 'Rapot')
@section('content')
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<div class="card">
    <div class="card-header">
        Daftar Siswa
    </div>
    <div class="card-body">
       <table class="table table-hover" id="dataTable">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Nis</th>
                   <th>Nama</th>
                   <th>Kelas</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @if($list_siswa->count())
               @foreach($list_siswa as $siswa)
               <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$siswa->nis}}</td>
                    <td>{{$siswa->nama}}</td>
                    <td>{{$siswa->coba->nama_kelas}}</td>
                    <td>
                        <a href="{{url('/rapot/'.$siswa->id)}}">Detail</a>
                    </td>

               </tr>
               @endforeach
               @endif
           </tbody>
       </table>
    </div>
</div>
@endsection