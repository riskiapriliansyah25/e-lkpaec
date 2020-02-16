<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Paket;
use App\Pembayaran;
use PDF;

class PembayaranController extends Controller
{
    public function index()
    {
        $list_siswa = Siswa::all();
        return view('pembayaran.index', compact('list_siswa'));
    }
    public function show(Siswa $siswa)
    {
        $list_paket = Paket::all();
        $list_pembayaran = Pembayaran::where('id_siswa', $siswa->id)->orderBy('id', 'desc')->get();
        return view('pembayaran.show', compact('siswa', 'list_paket', 'list_pembayaran'));
    }
    public function store(Request $request, Siswa $siswa)
    {
        $request->validate([
            'id_paket' => 'required',
            'keterangan' => 'required',
        ]);
        $pembayaran = new Pembayaran;
        $pembayaran->id_siswa = $siswa->id;
        $get_paket = explode('|', $request->id_paket);
        $id = $get_paket[0];
        $harga = $get_paket[1];
        $pembayaran->id_paket = $id;
        $pembayaran->total = $harga;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->save();
        return redirect('pembayaran/show/'.$siswa->id);
    }
    public function destroy(Pembayaran $pembayaran, Siswa $siswa)
    {
        Pembayaran::destroy($pembayaran->id);
        return redirect('pembayaran/show/'.$siswa->id);
    }
    public function exportPdf(Pembayaran $pembayaran)
    {
        $tahun = date('YmdHis');
        $pdf = PDF::loadview('export.invoice', compact('siswa', 'pembayaran'));
        return $pdf->download($pembayaran->created_at->format('dmY').'-'.$pembayaran->siswa->nis.$pembayaran->siswa->nama.'-invoice.pdf');
    }
}
