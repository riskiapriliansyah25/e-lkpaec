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
     <h5 align="center" style="font-weight: bold; font-size: 18pt: font-family: arial; margin-top: -20px;">Invoice</h5>
     <table>
         <tr>
             <td width="40">Tanggal</td>
             <td width="10">:</td>
             <td>{{$pembayaran->tgl_bayar}}</td>
         </tr>
         <tr>
             <td width="40">Nis</td>
             <td width="10">:</td>
             <td>{{$pembayaran->siswa->nis}}</td>
         </tr>
         <tr>
             <td width="40">Nama</td>
             <td width="10">:</td>
             <td>{{$pembayaran->siswa->nama}}</td>
         </tr>
         <tr>
             <td width="40">Alamat</td>
             <td width="10">:</td>
             <td>{{$pembayaran->siswa->alamat}}</td>
         </tr>
         <tr>
             <td width="40">No HP</td>
             <td width="10">:</td>
             <td>{{$pembayaran->siswa->no_hp}}</td>
         </tr>
         <tr>
             <td width="40">Paket</td>
             <td width="10">:</td>
             <td>{{$pembayaran->paket->nama_paket}}</td>
         </tr>
         <tr>
             <td width="40">Total</td>
             <td width="10">:</td>
             <td>{{$pembayaran->total}}</td>
         </tr>
         <tr>
             <td width="40">Keterangan</td>
             <td width="10">:</td>
            @if($pembayaran->keterangan == 1)
                <td>Lunas</td>
                @else
                <td>Belum Lunas</td>
                @endif
         </tr>
     </table>
<!-- endisi -->
<br>
<div style="text-align: center; width: 50%; float: right; padding: 20px;">
    Mengetahui
    <br>
    <br>
    <br>
    <br>
    <br>
    <b>Admin</b>
</div>

