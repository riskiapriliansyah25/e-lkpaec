<?php

namespace App\Http\Controllers;
use App\Daftar;
use App\Siswa;
use App\Buku;
use App\Nilaiujian;
use App\Coba;
use App\Instruktur;
use PDF;
use DB;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    public function index()
    {
        $list_pendaftar = Daftar::all();
        
        $jumlah_pendaftar = $list_pendaftar->count();;
        $jumlah_siswa = Siswa::count();
        $jumlah_buku = Buku::count();
        $jumlah_instruktur = Instruktur::count();
        $jumlah_kelas = Coba::count();

       $kategori = [];
        //data chart
        foreach($list_pendaftar as $lp){
            $kategori[] = $lp->created_at->month;
        }
        
        return view('pimpinan.index', compact('title', 'jumlah_pendaftar', 'jumlah_siswa', 'jumlah_instruktur', 'jumlah_paket', 'jumlah_buku', 'jumlah_kelas', 'kategori'));
    }
    public function pendaftar()
    {
        $list_pendaftar = Daftar::all();
        return view('pimpinan.pendaftar', compact('list_pendaftar'));
    }
    public function siswa()
    {
        $list_siswa = Siswa::all();
        return view('pimpinan.siswa', compact('list_siswa'));
    }
    public function showSiswa(Siswa $siswa)
    {
        return view('pimpinan.showSiswa', compact('siswa'));
    }
    public function instruktur()
    {
        $list_instruktur = Instruktur::all();
        return view('pimpinan.instruktur', compact('list_instruktur'));
    }
    public function kelas()
    {
        $list_siswa = Siswa::where('status', 1)->get();
        $list_kelas = Coba::all();
        return view('pimpinan.kelas', compact('list_kelas'));
    }
    public function showKelas(Coba $coba)
    {

        $list_siswa = Siswa::where([['kelas_id' , '=', $coba->id], ['status', '=' , 1]])->get();
        return view('pimpinan.showKelas', compact('coba', 'list_siswa'));
    }
    public function nilaiUjian()
    {
        $list_siswa = Nilaiujian::all();
        return view('pimpinan.nilaiujian', compact('list_siswa'));
    }
    public function exportPdf()
    {
        $tahun = date('YmdHis');
        $list_nilai = Nilaiujian::all();
        $pdf = PDF::loadview('export.nilaiujianpdf', compact('list_nilai'));
        return $pdf->download($tahun.'-Nilai Ujian Siswa.pdf');
    }
    public function buku()
    {
        $list_buku = Buku::all();
        return view('pimpinan.buku', compact('list_buku'));
    }
}
