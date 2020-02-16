@extends('layouts.adminmaster') 
@section('title', 'Dashboard')
@section('content')
<div class="row">
  <div class="col-md-7">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
  </div>
  <div class="col-md-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
      </ol>
    </nav>
  </div>
</div>



    <div class="row">
            <!-- Pendaftar Baru -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="{{url('/pimpinan/pendaftar')}}">Pendaftar</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_pendaftar}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Siswa -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="{{url('/pimpinan/siswa')}}">Siswa</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_siswa}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Instruktur -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="{{url('/pimpinan/instruktur')}}">Instruktur</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_instruktur}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Buku -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="{{url('/pimpinan/buku')}}">Buku</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_buku}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Kelas -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="{{url('/pimpinan/kelas')}}">Kelas</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_kelas}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>

    <div class="panel">
      <div id="chartpendaftar"></div>
    </div>

@endsection

@push('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartpendaftar', {
    chart: {
        type: 'column'
    },
    title: {
        text: '2020'
    },
    xAxis: {
        categories: [
            'Pendaftar',
            'Siswa',
            'Instruktur',
            'Kelas',
            'Buku'            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Banyaknya'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah',
        data: [{{$jumlah_pendaftar}}, {{$jumlah_siswa}}, {{$jumlah_instruktur}}, {{$jumlah_kelas}}, {{$jumlah_buku}}]

    }]
});
</script>
@endpush


