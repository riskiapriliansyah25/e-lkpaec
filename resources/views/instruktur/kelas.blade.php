@extends('layouts.adminmaster') 
@section('title', 'Kelas')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelas yang diajar: {{Auth::user()->name}}</h1>

<table class="table table-hover" id="dataTable">
<thead>
    <tr>
        <th>#</th>
        <th>Nama Kelas</th>
    </tr>
</thead>
<tbody>
    @foreach($list_kelas as $kelas)
    <tr>
        <th>1</th>
        <td><a href="{{url('/kelas/'.$kelas->id)}}">{{$kelas->nama_kelas}}</a></td>
    </tr>
    @endforeach
</tbody>
</table>


@endsection


