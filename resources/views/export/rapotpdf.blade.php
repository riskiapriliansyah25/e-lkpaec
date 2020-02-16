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
     <h5 align="center" style="font-weight: bold; font-size: 18pt: font-family: arial; margin-top: -20px;">Result Of Study</h5>
     <table>
         <tr>
             <td width="40">Name</td>
             <td width="10">:</td>
             <td>{{$rapot->siswa->nama}}</td>
         </tr>
         <tr>
             <td width="40">Student Number</td>
             <td width="10">:</td>
             <td>{{$rapot->siswa->nis}}</td>
         </tr>
         <tr>
             <td width="40">Level</td>
             <td width="10">:</td>
             <td>{{$rapot->kriteria->buku->nama_buku}}</td>
         </tr>
     </table>

     <table style="border: 1px double black; margin-top:20px;" align="center" cellspacing="0" cellpadding="10">  
        <tr>
          <th width='20' style="border: 1px double black;">No</th>
          <th style="border: 1px double black;" width='200'>Unit Competency</th>
          <th colspan="2" style="border: 1px double black;">Grade</th>
          <th style="border: 1px double black;">Remark</th>
        </tr>
        <tr>
          <td style="border: 1px double black;">1</td>
          <td style="border: 1px double black;">{{$rapot->kriteria->kriteria_1}}</td>
          <td style="border: 1px double black;">Speaking</td>
          <td style="border: 1px double black;">{{$rapot->speaking}}</td>
          <td style="border: 1px double black;" widht="200px" rowspan="6">{{$rapot->remark}}</td>

        </tr>
        <tr>
          <td style="border: 1px double black;">2</td>
          <td style="border: 1px double black;">{{$rapot->kriteria->kriteria_2}}</td>
          <td style="border: 1px double black;">Listening</td>
          <td style="border: 1px double black;">{{$rapot->listening}}</td>
        </tr>
        <tr>
          <td style="border: 1px double black;">3</td>
          <td style="border: 1px double black;">{{$rapot->kriteria->kriteria_3}}</td>
          <td style="border: 1px double black;">Reading</td>
          <td style="border: 1px double black;">{{$rapot->reading}}</td>
        </tr>
        <tr>
          <td style="border: 1px double black;">4</td>
          <td style="border: 1px double black;">{{$rapot->kriteria->kriteria_4}}</td>
          <td style="border: 1px double black;">Writing </td>
          <td style="border: 1px double black;">{{$rapot->writing}}</td>
        </tr>
        <tr>
          <td style="border: 1px double black;">5</td>
          <td style="border: 1px double black;">{{$rapot->kriteria->kriteria_5}}</td>
          <td style="border: 1px double black;">Vocabulary</td>
          <td style="border: 1px double black;">{{$rapot->vocabulary}}</td>
        </tr>
        @if(isset($rapot->kriteria->kriteria_6))
        <tr>
          <td style="border: 1px double black;">6</td>
          <td style="border: 1px double black;">{{$rapot->kriteria->kriteria_6}}</td>
          <td ></td>
          <td></td>
        </tr>
        @endif
    </table>

    <p>Grading System</p>
    <p>A : Excellent</p>
    <p>B : Good</p>
    <p>C : Fair</p>
    <p>D : Poor</p>

<!-- endisi -->
<br>
<div style="text-align: center; width: 50%; float: right; padding: 20px;">
    Instruktur
    <br>
    <br>
    <br>
    <br>
    <br>
    <b>{{$rapot->siswa->coba->instruktur->nama}}</b>
</div>

