@extends('layouts/master')
@section('title', 'LKP AEC')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Learning english <span>faster</span> <br> and <span>better</span> with us</h1>
        <a href="{{url('/daftar')}}" class="btn btn-primary tombol">Daftar Sekarang</a>
    </div>
</div>
<!-- end jumbotron -->
<div class="container">
    <h2 align="center">Active English Course</h2>
    <hr>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card" style="width: 30rem;">
            <img src="{{asset('img/kelas.jpg')}}" class="card-img-top" alt="..." height="300">
                <div class="card-body">
                <h5 class="card-title text-center">Kelas Bahasa Inggris Anak-Anak Sampai SMA</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="width: 30rem;">
            <img src="{{asset('img/umum.jpg')}}" class="card-img-top" alt="..." height="300">
                <div class="card-body">
                <h5 class="card-title text-center">Kelas Bahasa Inggris Mahasiswa/Umum</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!--alamat-->
<br>
<div class="alamat">
  <div class="container-fluid">
    <h1 class="display-4">Ayo Kunjungi Kami dan Daftarkan Diri Anda</h1>
    <p class="lead">Jalan Awang Long Senopati RT.01 NO.19 Kel-Sukarame Kec-Tenggarong Kaltim 75515 Telp. 0541-661781</p>
    <p class="lead">Senin-Rabu : Jam 09.00 sampai 21.00 </p>
    <p class="lead">Kamis : Jam 09.00  sampai 21.00 </p>
    <p class="lead">Jumat : Jam 09.00  sampai 21.00 </p>
    <p class="lead">Sabtu : Jam 09.00 sampai 18.00 </p>
  </div>
</div>
<!--endalamat-->
<!--bagan-->
<div class="about text-center" id="tentang">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="{{asset('img/mrindra.jpg')}}" class="rounded-circle bingkai">
            <h1 >Indra Gunawan</h1>
            <p>Owner | Instructor</p>
        </div>
    </div>
</div>
<div class="aboutt">
<h2 class="text-center">About</h2>
<hr>
<div class="row">
      <div class="col-sm-6">
        <p class="pkiri">Lembaga kursus dan pelatihan Active English Course (AEC) secara resmi didirikan pada tanggal 29 Februari 2002 dan dilegalkan secara hukum dengan akta pendirian notaris Bambang Sudarsono, SH no 195 dan kemudian terjadi perubahan pengurus dan dilegalkan lagi dengan akta pendirian notaris Bambang Sudarsono, SH no 177 pada tanggal 25 Oktober 2010. Bertempat di jalan Awang Long Senopati Rt. 1 No. 19 Kelurahan Sukarame Tenggarong Kabupaten Kutai Kartanegara Kalimantan Timur.</p>
        <p>
        AEC merupakan sebuah kursus bahasa Inggris, yang menawarkan sistem belajar bahasa inggris yang aktif kepada peserta didiknya. Dimana penekanan metode pembelajaran meliputi 90% Speaking Skill 10% Writing, Reading, Listening. Program belajar di AEC terbuka untuk berbagai tingkatan usia mulai dari anak pada usia TK nol besar SD SMP SMA dan Universitas / Umum. Kelas dibuka pada waktu pagi, siang, sore, dan malam hari. Dan AEC juga melayani untuk program private baik untuk individu dan kelompok yang ingin belajar dirumah maupun in office training untuk mereka yang bekerja.
        </p>
      </div>
      <div class="col-sm-6">
        <p class="pkanan">Sebagai lulusan dari lembaga kursus dan pelatihan Active English Course (AEC) telah bekerja baik sebagai pengajar bahasa inggris di sekolah dan lembaga kursus atau mengajar secara private, sebagian lagi diterima bekerja di perusahaan yang menerima mereka dengan persyaratan kecakapan dalam bahasa inggris. Prinsip dasar AEC adalah mengenali dan memahami apa yang diinginkan oleh mereka yang ingin mengembangkan kemampuan mereka. Maka dengan demikian AEC tetap terus bisa eksis dan berkembang sampai pada hari ini. Sudah ribuan peserta yang bergabung dengan AEC semenjak didirikan pada tahun 2002. Dan ini merupakan indikasi yang baik sebagai pembuktian bahwa AEC dipercaya sebagai tempat yang tepat, nyaman dan mampu memberikan apa yang selama ini diinginkan oleh kebanyak masyarakat.</p>
      </div>
    </div>
</div>
<section></section>

<footer>
   <p align="center">Jalan Awang Long Senopati RT.01 NO.19 Kel-Sukarame Kec-Tenggarong Kaltim 75515 Telp. 0541-661781</p>
   <p align="center">&copy; CopyRight Active English Course 2018</p>
  </footer>
@endsection
@push('css')
<style>
footer{
    background-color: darkolivegreen;
    padding:20px;
    color: #eaeaea;
}
hr{
    width: 20%;
    border: 2px solid dimgray;
    border-radius: 5px;
}
.alamat{
    background-color: #eaeaea;
    padding: 30px;
    margin-top: 30px;
}
.about{
    padding: 20px;
}
.aboutt{
    background-color: #eaeaea;
    padding: 30px;
}
</style>
@endpush
