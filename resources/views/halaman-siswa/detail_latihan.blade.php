@extends('layouts/ujianmaster')
@section('title', 'Latihan')
@section('content')
<div class="container">
    <div class="card my-5" style="border: 1px solid black;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">Buku</div>
                <div class="col-md-10">: {{$soal->buku->nama_buku}}</div>
            </div>
            <div class="row">
                <div class="col-md-2">Materi</div>
                <div class="col-md-10">: {{$soal->materi->judul}}</div>
            </div>
            <div class="row">
                <div class="col-md-2">Jumlah Soal</div>
                <div class="col-md-10">: {{$soal->detailsoallatihan->count()}}</div>
            </div>
            <div class="row">
                <div class="col-md-2">Waktu</div>
                <div class="col-md-10">: {{$soal->waktu.' menit'}}</div>
            </div>
            <div class="row">
                <div class="col-md">
                <button class="btn btn-primary btn-lg btn-block my-3" id="start-exam" onclick="$('#specialstuff').fullScreen(true)">Mulai Mengerjakan Soal!</button>
                </div>
            </div>
        </div>
    </div>

    <div style="padding:  10px; border: double #fff 15px; color: #fff; background: #b90000;">
        <p style="font-weight: bold;">Silahkan kerjakan soal yang telah di siapkan. Harap dipatuhi peraturan berikut!</p>
        <ul>
            <li>Jangan mereload/refresh browser (jawaban akan hilang)</li>
            <li>Jangan menekan tombol selesai saat mengerjakan soal, kecuali saat anda telah selesai mengerjakan seluruh soal</li>
            <li>Perhatikan sisa waktu ujian, sistem akan mengumpulkan jawaban saat waktu sudah selesai</li>
            <li>Waktu ujian akan dimulai saat tombol "<b>Mulai Mengerjakan Soal!</b>" di klik</li>
        </ul>
    </div>
</div>


<!-- tampilkan soal disini -->
<div id="specialstuff" style="display: none; overflow-y: scroll !important; background-color: #eaeaea;">
		<div style="height: 40px; background: #0419d0; color: #fff; margin-bottom: 10px">
			<p style="padding-top: 8px; padding-left: 15px; font-weight: bold;">E-Learning LKP Active English Course</p>
		</div>
		<div class="row">
			<div class="col-sm">
				<div class="card" style="overflow-y: scroll;">
					<div class="card-header">
						<h3 class="box-title">
							Soal No:
							@if($soals->count())
											@foreach($soals as $key_number=>$data_number)
												@if($key_number == 0) <span id="no_soal_detail">1</span> @endif
											@endforeach
										@endif
						</h3>
						<div class="box-tools pull-right" style="width: 350px;">
							<p style="margin: 2px;" class="pull-right">
								<span id="info-waktu" style="display: none; color: #f00; margin-right: 25px"></span>
								Sisa waktu
								<span id="countdown" class="timer"></span>
							</p>
						</div>
					</div>
					<div class="card-body">
						<div id="wrap-soal">
							@if($soals->count())
								@foreach($soals as $key=>$data)
									@if($key == 0)
										<span class="detail_soal_id" style="display: none;">{{ $data->id }}</span>
										@if(isset($data->audio))
										<audio controls>
											<source src="{{asset('kumpulansoal/audio/'.$data->audio)}}" type="audio/mp3">
										</audio>
										@endif
										@if(isset($data->gambar))
										<img src="{{asset('kumpulansoal/gambar/'.$data->gambar)}}" class="img-thumbnail" width='400' height='400'>
										@endif
										<div class="soal">{!! $data->soal !!}</div>
										{!! $data->pila ? '<div class="jawab"
											soal-id="'.$data->id_soal.'"
											data-id="'.$data->id.'"
											data-jawab="A/'.$data->id.'/'.Auth::user()->id.'">
											<table width="100%">
												<tr>
													<td width="15px" valign="top"><span>A.</span></td>
													<td valign="top" class="pilihan">'.$data->pila.'</td>
												</tr>
											</table>
										</div>' : '' !!}
										{!! $data->pilb ? '<div class="jawab"
											soal-id="'.$data->id_soal.'"
											data-id="'.$data->id.'"
											data-jawab="B/'.$data->id.'/'.Auth::user()->id.'">
											<table width="100%">
												<tr>
													<td width="15px" valign="top"><span>B.</span></td>
													<td valign="top" class="pilihan">'.$data->pilb.'</td>
												</tr>
											</table>
										</div>' : '' !!}
										{!! $data->pilc ? '<div class="jawab"
											soal-id="'.$data->id_soal.'"
											data-id="'.$data->id.'"
											data-jawab="C/'.$data->id.'/'.Auth::user()->id.'">
											<table width="100%">
												<tr>
													<td width="15px" valign="top"><span>C.</span></td>
													<td valign="top" class="pilihan">'.$data->pilc.'</td>
												</tr>
											</table>
										</div>' : '' !!}
										{!! $data->pild ? '<div class="jawab"
											soal-id="'.$data->id_soal.'"
											data-id="'.$data->id.'"
											data-jawab="D/'.$data->id.'/'.Auth::user()->id.'">
											<table width="100%">
												<tr>
													<td width="15px" valign="top"><span>D.</span></td>
													<td valign="top" class="pilihan">'.$data->pild.'</td>
												</tr>
											</table>
										</div>' : '' !!}
										{!! $data->pile ? '<div class="jawab"
											soal-id="'.$data->id_soal.'"
											data-id="'.$data->id.'"
											data-jawab="E/'.$data->id.'/'.Auth::user()->id.'">
											<table width="100%">
												<tr>
													<td width="15px" valign="top"><span>E.</span></td>
													<td valign="top" class="pilihan">'.$data->pile.'</td>
												</tr>
											</table>
										</div>' : '' !!}
									@endif
								@endforeach
							@endif
						</div>
					</div>
					<div class="box-footer">
						<table width="100%">
							<tr>
								<!-- <td width="33%" align="center"><button class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Soal Sebelumnya</button></td> -->
								<!-- <td width="33%" align="center"><button class="btn btn-warning">Ragu-ragu</button></td> -->
								<!-- <td width="33%" align="center"><button class="btn btn-primary">Soal Berikutnya <i class="fa fa-angle-double-right"></i></button></td> -->
								<td>
									<button type="button" class="btn pull-left" id="keluar" style="background-image: linear-gradient(to right, #f31515 , #c12704); border: none; color: #fff;" onclick="$('#specialstuff').fullScreen(false)"><i class="fa fa-times-circle" aria-hidden="true"></i> Keluar</button>
									<button type="button" class="btn pull-right" id="kirim" style="background-image: linear-gradient(to right, #1523f3 , #0495c1); border: none; color: #fff;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim Hasil Ujian</button>
								</td>
							</tr>
						</table>
						<div id="confirm" style="display: none; margin: 15px 0; border: solid thin #aaa; padding: 10px;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-sm">
				<div class="card color-palette-card">
						<div class="card-body">
							<span>Nomor Soal</span>
							@if($soals->count())
							<nav aria-label="Page navigation">
								<ul class="pagination" style="margin-top: 5px !important;">
										@foreach($soals as $key_number=>$data_number)
										<li class="no_soal"
										id="{{ 'nav'.$data_number->id }}"
										data-id="{{ $data_number->id }}"
										data-no="{{ $key_number+1 }}"><a href="#">{{ $key_number+1 }}</a></li>
										@endforeach
									</ul>
							</nav>
							@endif
						</div>
				</div>  	
			</div>
		</div>
</div>
	<noscript>
	  <style type="text/css">
	    #specialstuff {display:none;}
	  </style>
	  <div class="noscriptmsg">
		  You don't have javascript enabled.  Good luck with that.
	  </div>
	</noscript>
@endsection
@push('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" /> -->
<style>
	.dijawab {
		background: #1980d4;
		color: #fff;
		padding: 5px 10px;
    border-radius: 3px;
	}
	.pagination{
		padding: 20px;
	}
	.pagination>li>a, .pagination>li>span {
		width: 38px;
    text-align: center;
    margin: 3px;
	padding:10px;
	border: 1px solid #eaeaea;
	}
	.timer{
		border: solid thin #b9b2b2;
    padding: 5px 15px;
    font-size: 14pt;
    color: #fff;
    background: #291a71;
	}
	.soal{
		margin: 0 0 15px 0;
	}
	.box-footer {
    border-top: 1px solid #ebebeb !important;
	}
	.jawab{
		cursor: pointer;
		margin: 0 0 7px 0;
	}
	.pilihan p{
		margin: 0;
	}
</style>
@endpush
@push('scripts')
<script src="{{ url('js/jquery.fullscreen-min.js') }}"></script>
<!-- <script src="{{ url('js/script.js') }}"></script> -->
<script src="{{ url('assets/dist/js/sweetalert2.all.min.js') }}"></script>
<script>
	var upgradeTime = "{{ $soal->waktu*60 }}";
	var seconds = upgradeTime;
	function timer() {
	var days        = Math.floor(seconds/24/60/60);
	var hoursLeft   = Math.floor((seconds) - (days*86400));
	var hours       = Math.floor(hoursLeft/3600);
	var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
	var minutes     = Math.floor(minutesLeft/60);
	var remainingSeconds = seconds % 60;
		if (remainingSeconds < 10) {
			remainingSeconds = "0" + remainingSeconds; 
		}
	document.getElementById('countdown').innerHTML = hours + " : " + minutes + " : " + remainingSeconds;
	   if (seconds == 300) {
	   	$('#info-waktu').html('Ujian tinggal <b>5</b> menit').show();
	   	seconds--;
	   } else if(seconds == 0) {
		var id_soal = "{{$soal->id}}";
			$.ajax({
				type: "POST",
				url: "{{ url('e-learning/latihan/kirim-jawaban') }}",
				data: {id_soal: id_soal},
				success: function(data) {
					window.location.href = "{{ url('e-learning/latihan/finish/'.$soal->id) }}";
				}
			})
	   } else {
	     seconds--;
	   }
	 }

	$(document).bind("fullscreenchange", function(e) {
		if ($(document).fullScreen()) {
			console.log('sedang ujian!');
		}else{
			$("#specialstuff").hide();
		}
  });


	$(document).ready(function(){

		if (typeof(Storage) !== "undefined") {
	    // console.log('browser support localstorage');
		} else {
	    swal(
			  'Update Browser!',
			  'Browser tidak support untuk proses ujian ini!',
			  'warning'
			)
		}
		$('.no_soal').click(function() {
			var $this = $(this);
			$('#wrap-soal').html('<center><i class="fa fa-spinner fa-spin" style="font-size: 30pt; color: #12b9cc; margin: 15px;" aria-hidden="true"></i></center>');
			$('#no_soal_detail').html($this.attr('data-no'));
			var id_soal = $this.attr('data-id');
			$.ajax({
				type: "GET",
				url: "{{ url('e-learning/latihan/get-soal') }}/"+id_soal,
				success: function(data) {
					$('#wrap-soal').html(data);
				}
			})
		});

		// ubah status jawab soal
		$('#kirim').click(function() {
			// $('#confirm').html(`
			// 	<p>Yakin jawaban kamu akan dikirimkan sekarang? Kamu masih mempunyai waktu `+Math.floor(seconds/60)+` menit. Setelah mengirimkan jawaban, kamu tidak bisa kembali memeriksa jawaban.<p>
  	// 		<button type="button" class="btn" id="batal" style="background-image: linear-gradient(to right, #f31515 , #c12704); border: none; color: #fff;"><i class="fa fa-ban" aria-hidden="true"></i> Tidak! Saya Mau Cek Lagi.</button>
  	// 		<button type="button" class="btn" id="kirim-jawaban" data-id="{{ $soal->id }}" style="background-image: linear-gradient(to right, #1523f3 , #0495c1); border: none; color: #fff;"><i class="fa fa-check-circle" aria-hidden="true"></i> Iya! Saya Kirim Jawaban Saya Sekarang.</button>
			// `).show();
			$('#confirm').html(`
				<pSetelah mengirimkan jawaban, kamu tidak bisa kembali memeriksa jawaban.<p>
  			<button type="button" class="btn" id="batal" style="background-image: linear-gradient(to right, #f31515 , #c12704); border: none; color: #fff;"><i class="fa fa-ban" aria-hidden="true"></i> Tidak! Saya Mau Cek Lagi.</button>
  			<button type="button" class="btn" id="kirim-jawaban" data-id="{{ $soal->id }}" style="background-image: linear-gradient(to right, #1523f3 , #0495c1); border: none; color: #fff;"><i class="fa fa-check-circle" aria-hidden="true"></i> Iya! Saya Kirim Jawaban Saya Sekarang.</button>
			`).show();
		});

		$(document).on('click', '#batal', function() {
			$('#confirm').hide();
		});

		$(document).on('click', '#kirim-jawaban', function() {
			var $this = $(this);
			var id_soal = $this.attr('data-id');
			$.ajax({
				type: "POST",
				url: "{{ url('e-learning/latihan/kirim-jawaban') }}",
				data: {id_soal: id_soal},
				success: function(data) {
					window.location.href = "{{ url('e-learning/latihan/finish/'.$soal->id) }}";
				}
			})
		});

		var jawab = [];
		var detail_soal_id = [];
		
		$("#start-exam").click(function(){
		var countdownTimer = setInterval('timer()', 1000);
			$("#specialstuff").show();
		});

		$(document).on('click', ".jawab", function(){
			var $this = $(this);
			var get_jawab = $this.attr('data-jawab');
			var id_soal = $this.attr('data-id');
			var paket_soal = $this.attr('soal-id');
			$('#nav'+id_soal).find('a').css({"background-color": "#1980d4", "color": "yellow"});
			 console.log(id_soal);
			$(".jawab").css({"background-color": "#fff", "color": "#000", "padding": "0","border-radius": "0"});
			$this.css({"background-color": "#1980d4", "color": "#fff", "padding": "5px 10px", "border-radius": "3px"});
			
			$.ajax({
				type: "POST",
				url: "{{ url('e-learning/latihan/jawab') }}",
				data: {get_jawab: get_jawab},
				success: function(data) {
					console.log(data);
				}
			})
			
		});
	});

</script>
@endpush
