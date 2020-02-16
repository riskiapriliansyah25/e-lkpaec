<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kriteria;
use App\Buku;
use App\Coba;
use App\Nilaiujian;
use App\Rapot;
use PDF;

class RapotController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == "admin"){
            $list_kelas = Coba::all();
        }else{
            $list_kelas = Coba::where('instruktur_id', auth()->user()->instruktur->id)->get();
        }
        return view('rapot.index', compact('list_kelas'));
    }
    public function detailKelas(Coba $coba)
    {
        $list_siswa = Siswa::where('kelas_id', $coba->id)->where('status', 1)->get();
        return view('rapot.detailKelas', compact('list_siswa', 'coba'));
    }
    public function getRapot(Coba $coba, Siswa $siswa, Request $request)
    {
        $list_kriteria = Kriteria::all();
        $list_rapot = Rapot::where('id_siswa', $siswa->id)->get();
        return view('rapot.getRapot', compact('siswa', 'coba', 'list_kriteria', 'list_rapot'));
    }
    public function exportPdf(Rapot $rapot)
    {
        $nilai = Nilaiujian::where('id_user', $rapot->siswa->user_id)->first();
        $pdf = PDF::loadview('export.rapotpdf', compact('siswa', 'rapot', 'nilai'));
        return $pdf->download($rapot->kriteria->buku->nama_buku.'_'.$rapot->siswa->nama.'_rapot.pdf');
    }
    
    public function storeRapot(Request $request)
    {
        $request->validate([
            'id_kriteria' => 'required',
            'speaking' => 'required|alpha',
            'listening' => 'required|alpha',
            'reading' => 'required|alpha',
            'writing' => 'required|alpha',
            'vocabulary' => 'required|alpha',
            'remark' => 'required',
        ]);

        $rapot = new Rapot;
        $rapot->id_siswa = $request->id_siswa;
        $rapot->id_kriteria = $request->id_kriteria;
        $rapot->speaking = $request->speaking;
        $rapot->listening = $request->listening;
        $rapot->reading = $request->reading;
        $rapot->writing = $request->writing;
        $rapot->vocabulary = $request->vocabulary;
        $rapot->remark = $request->remark;
        $rapot->id_user = auth()->user()->id;
        $rapot->save();
        return redirect('rapot/detail/'.$request->id_kelas.'/get-rapot'.'/'.$request->id_siswa)->with('sukses', 'Data rapot telah dibuat');
    }
    public function deleteRapot(Coba $coba, Siswa $siswa, Rapot $rapot)
    {
        Rapot::destroy($rapot->id);
        return redirect('rapot/detail/'.$coba->id.'/get-rapot'.'/'.$siswa->id)->with('sukses', 'Data telah dihapus');
    }

    public function kriteria()
    {
        $list_buku = Buku::all();
        $list_kriteria = Kriteria::all();
        return view('rapot.kriteria', compact('list_kriteria','list_buku'));
    }
    public function storeKriteria(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'kriteria_1' => 'required',
            'kriteria_2' => 'sometimes',
            'kriteria_3' => 'sometimes',
            'kriteria_4' => 'sometimes',
            'kriteria_5' => 'sometimes',
            'kriteria_6' => 'sometimes',
        ]);
        Kriteria::create($request->all());
        return redirect('rapot/kriteria')->with('sukses', 'Data telah ditambahkan');
    }
    public function showKriteria(Kriteria $kriteria)
    {
        $list_buku = Buku::all();
        return view('rapot.showKriteria', compact('kriteria', 'list_buku'));
    }
    public function updateKriteria(Request $request, Kriteria $kriteria)
    {
        $kriteria->update($request->all());
        return redirect('rapot/kriteria')->with('sukses', 'Data telah diupdate');
    }
    public function deleteKriteria(Kriteria $kriteria)
    {
        Kriteria::destroy($kriteria->id);
        return redirect('rapot/kriteria')->with('sukses', 'Data telah dihapus');
    }
}
