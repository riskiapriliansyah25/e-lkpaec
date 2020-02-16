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
     <h5 align="center" style="font-weight: bold; font-size: 18pt: font-family: arial; margin-top: -20px;">Data Siswa</h5>
     <table>
         <tr>
             <td width="40">Nis</td>
             <td width="10">:</td>
             <td>{{$siswa->nis}}</td>
         </tr>
         <tr>
             <td width="40">Nama</td>
             <td width="10">:</td>
             <td>{{$siswa->nama}}</td>
         </tr>
         <tr>
             <td width="40">Tanggal Lahir</td>
             <td width="10">:</td>
             <td>{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</td>
         </tr>
         <tr>
             <td width="40">Alamat</td>
             <td width="10">:</td>
             <td>{{$siswa->alamat}}</td>
         </tr>
         <tr>
             <td width="40">No HP</td>
             <td width="10">:</td>
             <td>{{$siswa->no_hp}}</td>
         </tr>
         <tr>
             <td width="40">Jenis Kelamin</td>
             <td width="10">:</td>
             @if($jenis_kelamin = 'L')
             <td>Laki-Laki</td>
             @else
             <td>Perempuan</td>
             @endif
         </tr>
         <tr>
             <td width="40">Level Buku</td>
             <td width="10">:</td>
             <td>{{$siswa->buku->nama_buku}}</td>
         </tr>
         <tr>
             <td width="40">Kelas</td>
             <td width="10">:</td>
             <td>{{$siswa->coba->nama_kelas}}</td>
         </tr>
         <tr>
             <td width="40">Instruktur</td>
             <td width="10">:</td>
             <td>{{$siswa->coba->instruktur->nama}}</td>
         </tr>
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

