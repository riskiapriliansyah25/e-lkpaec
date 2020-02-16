@extends('layouts/elearningmaster')
@section('title', 'LKP AEC')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Learning english <span>faster</span> <br> and <span>better</span> with us</h1>
    </div>
</div>
<div class="row justify-content-center my-5" id="login">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                            <h1 class="h4 text-gray-900 mb-4">Welcome to e-lkpaec, {{auth()->user()->name}}</h1>
                            @if(isset(auth()->user()->siswa->kelas_id))
                            <h1 class="h4 text-gray-900 mb-4">Your class is  {{auth()->user()->siswa->coba->nama_kelas}}</h1>
                            <h1 class="h4 text-gray-900 mb-4">Your instructor is  {{auth()->user()->siswa->coba->instruktur->nama}}</h1>
                            @else
                            <h1 class="h4 text-gray-900 mb-4">-</h1>
                            @endif
                        
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('css')
<style>
.card{
    border: 5px solid lightslategray;
    background-color: limegreen;
}
</style>
@endpush
