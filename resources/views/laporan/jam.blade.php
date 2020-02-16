@extends('layouts/adminmaster')
@section('title', 'Jam')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

<div class="clock">

</div>
@endsection
@push('script')
<script src="{{asset('assets/flip/compiled/flipclock.js')}}"></script>

<script>
    <?php 
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date ('Y-m-d H:i:s');
    $awal = strtotime($tgl);
    $diff = $awal;
    ?>
    var clock;
    $(document).ready(function(){
        var clock;
        clock = $(.clock).FlipClock({
            autoStart: false;
        });
        clock.setTime(<?php echo $diff;?>);
        clock.setCountdown(true);
        clock.start();
    });
</script>
@endpush