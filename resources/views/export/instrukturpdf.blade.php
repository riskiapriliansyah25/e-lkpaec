<div style=" height: 150px;">
      <div style=" float: left;">
       <img src="{{asset('assets/img/logoaec.jpg')}}" width="120" height="90">
   </div>
   <div style="text-align: center;">
       <div style="font-size: 30px; font-weight: bold; color: blue; margin-bottom: -25px;">LEMBAGA KURSUS DAN PELATIHAN </div> <br>
       <div style="font-size: 32px; font-weight: bold; color: red; margin-bottom: -25px;">ACTIVE ENGLISH COURSE</div> <br>
       <div style="font-size: 10px; margin-bottom: -25px;">Jl. Awang Long Senopati RT.01 No.19 Kel-Sukarame Kec-Tenggarong KALTIM 75515 Telp. 0541-661781</div>
   </div>
</div>
<div style="border-top: 3px solid #333; margin-top: -45px;"><hr></div>
     <br>
     <!-- isi -->
     <h5 align="center" style="font-weight: bold; font-size: 18pt: font-family: arial; margin-top: -20px;">Daftar Instruktur</h5>
     

     <table style="border: 1px solid black; margin-top:20px;" align="center" cellpadding='3'>  
        <tr>
            <th style="border: 1px solid black;">NII</th>
            <th style="border: 1px solid black;">Nama</th>
            <th style="border: 1px solid black;">Tempat, Tanggal Lahir</th>
            <th style="border: 1px solid black;">Jabatan</th>
            <th style="border: 1px solid black;">No HP</th>
            <th style="border: 1px solid black;">Jenis Kelamin</th>
            <th style="border: 1px solid black;">Tanggal Mulai Bertugas</th>
        </tr>
        @foreach($list_instruktur as $instruktur)
        <tr>
          <td style="border: 1px solid black;">{{$instruktur->nii}}</td>
          <td style="border: 1px solid black;">{{$instruktur->nama}}</td>
          <td style="border: 1px solid black;">{{$instruktur->tempat_lahir}}, {{$instruktur->tanggal_lahir}}</td>
          <td style="border: 1px solid black;">{{$instruktur->jabatan}}</td>
          <td style="border: 1px solid black;">{{$instruktur->no_hp}}</td>
          <td style="border: 1px solid black;">{{$instruktur->jenis_kelamin}}</td>
          <td style="border: 1px solid black;">{{$instruktur->tgl_mulai_bertugas}}</td>
        </tr>
        @endforeach
</table>
<!-- endisi -->
<br>
<div style="text-align: center; width: 50%; float: right; padding: 20px;">
    Pimpinan
    <br>
    <br>
    <br>
    <br>
    <br>
    <b>Indra Gunawan, M.Pd</b>
</div>

