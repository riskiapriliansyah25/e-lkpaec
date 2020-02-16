<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use App\Siswa;
use App\Buku;
use App\User;
use App\Coba;
use App\Distribusisoal;
use App\Soal;
use App\Detailsoal;
use App\Detailsoallatihan;
use App\Distribusisoallatihan;
use App\Jawab;
use App\Jawablatihan;
use App\Soallatihan;
use App\Nilaiujian;
use App\Pembayaran;
use App\Rapot;
use PDF;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Siswa';
        $list_siswa = Siswa::all();
        $list_buku  = Buku::all();
        $list_kelas = Coba::all();
        $tahun = date('y');
        
        $jumlah_siswa = Siswa::count();
        $noUrutAkhir = Siswa::max('nis');
        $no_terakhir = $noUrutAkhir +1;
        $nis_siswa = $noUrutAkhir +1;
       // $nis_siswa = $tahun."000".$no_terakhir;
        return view('siswa.index', compact('title', 'list_siswa', 'jumlah_siswa', 'list_buku', 'nis_siswa', 'list_kelas'));
    }
    /* public function cari(Request $request)
    {
        $title = 'siswa';
        $list_paket = Paket::all();
        $list_buku = Buku::all();
        $kata_kunci = $request->input('kata_kunci');
        $query = Siswa::where('nama', 'LIKE', '%'.$kata_kunci.'%');
        $list_siswa = $query->paginate(5);
        $pagination = $list_siswa->appends($request->except('page'));
        $jumlah_siswa = $list_siswa->total();
        return view('siswa.index', compact('list_siswa', 'kata_kunci', 'pagination', 'jumlah_siswa', 'title', 'list_paket', 'list_buku'));
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'buku_id' => 'required',
            'kelas_id' => 'required',
            'status' => 'required',
        ]);

        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->avatar = null;
        $user->username = $request->nis;
        $user->password = bcrypt('123456');
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add([
            'user_id' => $user->id,
        ]);

        Siswa::create($request->all());
        return redirect('siswa')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $title = "Details";
        $coba = $siswa->nama;
        return view('siswa.show', compact('siswa', 'title', 'coba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $title = 'Edit Data';
        $list_buku = Buku::all();
        $list_kelas = Coba::all();
        return view('siswa.edit', compact('siswa', 'title', 'list_buku', 'list_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $input  = $request->all();

        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'buku_id' => 'required',
            'kelas_id' => 'required',
            'status' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        //Avatar. Cek adakah foto?
        if($request->hasFile('foto')){
            //Hapus Foto lama jika ada foto baru.
            $exist = Storage::disk('foto_siswa')->exists($siswa->foto);
            if(isset($siswa->foto) && $exist){
                $delete = Storage::disk('foto_siswa')->delete($siswa->foto);
            }
            //upload foto baru.
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = "img/siswa";
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }
        $siswa->update($input);
        return redirect('siswa')->with('sukses', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        User::destroy($siswa->user_id);
        //Hapus Foto Kalau Ada
        $exist =Storage::disk('foto_siswa')->exists($siswa->foto);
        if(isset($siswa->foto) && $exist){
            $delete = Storage::disk('foto_siswa')->delete($siswa->foto);
        }
        Distribusisoal::where('id_siswa', $siswa->id)->delete();
        Nilaiujian::where('id_user', $siswa->user_id)->delete();
        Jawab::where('id_user', $siswa->user_id)->delete();
        Jawablatihan::where('id_user', $siswa->user_id)->delete();
        Nilaiujian::where('id_user', $siswa->user_id)->delete();
        Pembayaran::where('id_siswa', $siswa->id)->delete();
        Rapot::where('id_siswa', $siswa->id)->delete();
     
        $siswa->delete();
        return redirect('siswa')->with('sukses', 'Data Telah Dihapus');
    }
    public function exportPdf()
    {
        $tahun = date('YmdHis');
        $list_siswa = Siswa::all();
        $pdf = PDF::loadview('export.siswapdf', compact('list_siswa'));
        return $pdf->download($tahun.'_daftar_siswa.pdf');
    }
    public function exportPdfsiswa(Siswa $siswa)
    {
        $pdf = PDF::loadview('export.getsiswapdf', compact('siswa'));
        return $pdf->download($siswa->nis.$siswa->nama.'_siswa.pdf');
    }


    /* ujian */
    public function ujian()
    {
      $user = User::where('id', auth()->user()->id)->first();
      $pakets = Distribusisoal::where('id_siswa', auth()->user()->siswa->id)->get();
      $tes = Soal::where('jenis', 'tes')->orderBy('buku_id')->get();
      return view('e-learning.ujian', compact('user', 'pakets', 'tes'));
    }
    public function detailUjian($id)
    {
        $check_soal = Distribusisoal::where('id_soal', $id)->where('id_siswa', auth()->user()->siswa->id)->first();
        if ($check_soal) {
        $soal = Soal::where('id', $id)->first();
        $soals = Detailsoal::where('id_soal', $id)->where('status', 'Y')->inRandomOrder()->get();
        return view('halaman-siswa.detail_ujian', compact('soal', 'soals'));
        }else{
        return redirect('e-learning');
        }
    }
    public function getSoal($id)
    {
        $soal = Detailsoal::find($id);
        return view('halaman-siswa.get_soal', compact('soal'));
    }
    public function jawab(Request $request)
    {
        $get_jawab = explode('/', $request->get_jawab);
        $pilihan = $get_jawab[0];
        $id_detail_soal = $get_jawab[1];
        $id_siswa = $get_jawab[2];
        $detail_soal = Detailsoal::find($id_detail_soal);

        $jawab = Jawab::where('no_soal_id', $id_detail_soal)->where('id_user', auth()->user()->id)->first();
        if (!$jawab) {
        $jawab = new Jawab;
        $jawab->revisi = 0;
        }else{
        $jawab->revisi = $jawab->revisi + 1;
        }
        
        $jawab->no_soal_id = $id_detail_soal;
        $jawab->id_soal = $detail_soal->id_soal;
        $jawab->id_user = auth()->user()->id;
        $jawab->id_kelas = auth()->user()->siswa->kelas_id;
        $jawab->nama = auth()->user()->nama;
        $jawab->pilihan = $pilihan;

        $check_jawaban = Detailsoal::where('id', $id_detail_soal)->where('kunci', $pilihan)->first();
        if ($check_jawaban) {
        $jawab->score = $detail_soal->score;
        }else{
        $jawab->score = 0;
        }
        $jawab->status = 0;
        $jawab->save();
        return 1;
    }
    public function kirimJawaban(Request $request)
    {
        Jawab::where('id_soal', $request->id_soal)->where('id_user', auth()->user()->id)->update(['status' => 1]);
        $nilai = Jawab::where('id_soal', $request->id_soal)->where('id_user', auth()->user()->id)->sum('score');
        $nilaiujian = new Nilaiujian;
        $nilaiujian->id_user = auth()->user()->id;
        $nilaiujian->id_soal = $request->id_soal;
        $nilaiujian->nilai = $nilai;
        $nilaiujian->save();

        $buku_id = $nilaiujian->soal->buku_id;


        if($nilaiujian->soal->jenis == 'tes'){
            if($nilai >= 75){
              $id_buku = $buku_id + 1;
              $soal = Soal::where('buku_id', $id_buku)->where('jenis', 'tes')->first();
              $distribusi = new Distribusisoal;
              $distribusi->id_soal = $soal->id;
              $distribusi->id_siswa = auth()->user()->siswa->id;
              $distribusi->save();
            }
        }

    }

    public function finishUjian($id)
    {
        $soal = Distribusisoal::find($id);
        $soall = Soal::find($id);
        $jawaban = Jawab::where('id_soal', $id)->where('id_user', auth()->user()->id)->get();
        $query = Jawab::where('id_soal', $id)->where('id_user',  auth()->user()->id)->get();
        $jawaban_benar = $query->whereNotIn('score', 0);
        $nilai = Jawab::where('id_soal', $id)->where('id_user', auth()->user()->id)->sum('score');

        if($soall->jenis == 'ujian'){
            return view('halaman-siswa.finishujian', compact('soall', 'nilai', 'jawaban', 'jawaban_benar'));
        }else {
            return view('halaman-siswa.finishtes', compact('soall', 'nilai', 'jawaban', 'jawaban_benar'));
        }
    }
    /* End Ujian */

    /* Latihan */
    public function latihan(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $pakets = Distribusisoallatihan::where('id_kelas', auth()->user()->siswa->kelas_id)->get();
        return view('e-learning.latihan', compact('user', 'pakets'));
    }
    public function detailLatihan($id)
    {
        $check_soal = Distribusisoallatihan::where('id_soal', $id)->where('id_kelas', auth()->user()->siswa->kelas_id)->first();
        if ($check_soal) {
        $soal = Soallatihan::where('id', $id)->first();
        $soals = Detailsoallatihan::where('id_soal', $id)->where('status', 'Y')->inRandomOrder()->get();
        return view('halaman-siswa.detail_latihan', compact('soal', 'soals'));
        }else{
        return redirect('e-learning');
        }
    }
    public function getSoalLatihan($id)
    {
        $soal = Detailsoallatihan::find($id);
        return view('halaman-siswa.get_soal_latihan', compact('soal'));
    }
    public function jawabLatihan(Request $request)
    {
        $get_jawab = explode('/', $request->get_jawab);
        $pilihan = $get_jawab[0];
        $id_detail_soal = $get_jawab[1];
        $id_siswa = $get_jawab[2];
        $detail_soal = Detailsoallatihan::find($id_detail_soal);

        $jawab = Jawablatihan::where('no_soal_id', $id_detail_soal)->where('id_user', auth()->user()->id)->first();
        if (!$jawab) {
        $jawab = new Jawablatihan;
        $jawab->revisi = 0;
        }else{
        $jawab->revisi = $jawab->revisi + 1;
        }
        
        $jawab->no_soal_id = $id_detail_soal;
        $jawab->id_soal = $detail_soal->id_soal;
        $jawab->id_user = auth()->user()->id;
        $jawab->id_kelas = auth()->user()->siswa->kelas_id;
        $jawab->nama = auth()->user()->siswa->nama;
        $jawab->pilihan = $pilihan;

        $check_jawaban = Detailsoallatihan::where('id', $id_detail_soal)->where('kunci', $pilihan)->first();
        if ($check_jawaban) {
        $jawab->score = $detail_soal->score;
        }else{
        $jawab->score = 0;
        }
        $jawab->status = 0;
        $jawab->save();
        return 1;
    }
    public function kirimJawabanLatihan(Request $request)
    {
        Jawablatihan::where('id_soal', $request->id_soal)->where('id_user', auth()->user()->id)->update(['status' => 1]);
    }

    public function finishlatihan($id)
    {
        $soal = Soallatihan::find($id);
        $jawaban = Jawablatihan::where('id_soal', $id)->where('id_user', auth()->user()->id)->get();
        $query = Jawablatihan::where('id_soal', $id)->where('id_user',  auth()->user()->id)->get();
        $jawaban_benar = $query->whereNotIn('score', 0);
        $nilai = Jawablatihan::where('id_soal', $id)->where('id_user', auth()->user()->id)->sum('score');
        return view('halaman-siswa.finishlatihan', compact('soal', 'nilai', 'jawaban', 'jawaban_benar'));
    }
    /* End Latihan */
}
