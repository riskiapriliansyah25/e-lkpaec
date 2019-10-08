<?php

namespace App\Http\Controllers;
use App\Daftar;
use App\Siswa;
use App\Buku;
use App\Paket;
use App\Coba;
use App\Instruktur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $list_pendaftar = Daftar::where('status', '=', '0');
        $jumlah_pendaftar = $list_pendaftar->count();;
        $jumlah_siswa = Siswa::count();
        $jumlah_paket = Paket::count();
        $jumlah_buku = Buku::count();
        $jumlah_instruktur = Instruktur::count();
        $jumlah_kelas = Coba::count();
        $title = 'Dashboard';
        return view('admin.index', compact('title', 'jumlah_pendaftar', 'jumlah_siswa', 'jumlah_instruktur', 'jumlah_paket', 'jumlah_buku', 'jumlah_kelas'));
    }
}
