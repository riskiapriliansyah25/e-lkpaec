<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Coba;
use App\Buku;
use App\Distribusisoallatihan;
use App\Siswa;
use App\Soal;
use App\Soallatihan;
use App\Jawablatihan;
use App\Jawab;
use App\Detailsoallatihan;
use App\Nilaiujian;

class LaporanController extends Controller
{
    /* Ujian */
    public function indexUjian()
    {
        $list_siswa = Nilaiujian::all();
        return view ('laporan.indexujian', compact('list_siswa'));
    }
    public function detailHasil(Siswa $siswa, Soal $soal)
    {
        $jawaban = Jawab::where('id_soal', $soal->id)->where('id_user', $siswa->user_id)->get();
        $nilai = Jawab::where('id_soal', $soal->id)->where('id_user', $siswa->user_id)->sum('score');
        return view('laporan.getUjian', compact('soal', 'siswa', 'nilai', 'jawaban'));
    }
    public function resetUjian(Request $request)
    {
        $soalId = $request->soalId;
        $userId = $request->userId;

        DB::table('jawab')->where('id_soal', $soalId)->where('id_user', $userId)->delete();
        DB::table('nilaiujian')->where('id_soal', $soalId)->where('id_user', $userId)->delete();

    }
    /* end ujian */

    /* latihan */
    public function indexLatihan()
    {
        $list_kelas = Coba::all();
        if(auth()->user()->role == 'instruktur'){
            $list_kelasi = Coba::where('instruktur_id', auth()->user()->instruktur->id)->get();
        }
        return view ('laporan.indexlatihan', compact('list_kelas', 'list_kelasi'));
    }
    public function detailLatihan(Coba $coba)
    {
        $list_soal = Distribusisoallatihan::where('id_kelas', '=', $coba->id)->get();
        Return view('laporan.detailLatihan', compact('list_soal', 'coba'));
    }
    public function paketLatihan(Coba $coba, Soallatihan $soallatihan)
    {
        $list_siswa = Siswa::where('kelas_id', $coba->id)->where('status', 1)->get();
        return view('laporan.paketLatihan', compact('coba', 'soallatihan', 'list_siswa'));
    }
    public function getLatihan(Coba $coba, Soallatihan $soallatihan, Siswa $siswa)
    {
        $jawaban = Jawablatihan::where('id_soal', $soallatihan->id)->where('id_user', $siswa->user_id)->get();
        $nilai = Jawablatihan::where('id_soal', $soallatihan->id)->where('id_user', $siswa->user_id)->sum('score');
        return view('laporan.getLatihan', compact('coba', 'soallatihan', 'siswa', 'nilai', 'jawaban'));
    }
    public function resetLatihan(Request $request)
    {
        $soalId = $request->soalId;
        $userId = $request->userId;

        DB::table('jawablatihan')->where('id_soal', $soalId)->where('id_user', $userId)->delete();

    }
    /* end latihan */
    public function jam()
    {
        return view('laporan.jam');
    }
}
