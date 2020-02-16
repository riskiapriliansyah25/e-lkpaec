<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="padding-top: 50px; background-color: rgba(199, 198, 203, 0.57);font-family: Calibri;">
    <div id="wrapper">
     <div id="head">
      <div id="logo">
       <img src="{{asset('assets/img/logoaec.jpg')}}" width="250" height="150">
   </div>
   <div id="banner">
       <div id="f1">LEMBAGA KURSUS DAN PELATIHAN </div> <br>
       <div id="f2">ACTIVE ENGLISH COURSE</div> <br>
       <div id="f3">Jl. Awang Long Senopati RT.01 No.19 Kel-Sukarame Kec-Tenggarong KALTIM 75515 Telp. 0541-661781</div>
   </div>
</div>
<div class="garis"><hr></div>
     <br>
    @yield('content')
            <br>
            <div class="kanan">
                Kepala Lembaga Kursus
                <br>
                <br>
                <br>
                <br>
                <br>
                <b>Indra Gunawan, S.Pd, M.Pd</b>
            </div>
</body>
</html>