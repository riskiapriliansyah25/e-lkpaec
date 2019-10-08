<?php

namespace App\Http\Controllers;
use App\Soal;
use App\Distribusisoal;
use App\Coba;
use App\Detailsoal;
use App\Materi;
use App\Buku;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $list_soal = Soal::where('user_id', '=', auth()->user()->id)->get();
        $soal_admin = Soal::all();
        $list_materi = Materi::all();
        $list_buku = Buku::all();
        return view ('soal.index', compact('list_soal', 'list_materi', 'list_buku', 'soal_admin'));
    }
    public function storesoal(Request $request)
    {
        $request->request->add([
            'user_id' => auth()->user()->id,
        ]);
        Soal::create($request->all());
        return redirect('soal')->with('sukses','Data Berhasil Ditambahkan');
    }
    public function details(Soal $soal)
    {
        $list_kelas = Coba::all();
        if(auth()->user()->role == 'instruktur'){
            $instruktur_id = auth()->user()->instruktur->id;
            $kelas_ajar = Coba::where('instruktur_id', '=', $instruktur_id)->get();
        }
        $distribusi_soal = Distribusisoal::all();
        $detail_soal = Detailsoal::where('soal_id', '=', $soal->id)->get();
        return view('soal.detail', compact('soal', 'detail_soal', 'list_kelas', 'kelas_ajar', 'distribusi_soal'));
    }
    public function storedetail(Request $request, Soal $soal)
    {
        $request->request->add([
            'soal_id' => $soal->id,
            'jenis' => $soal->jenis,
            'user_id' => auth()->user()->id,
        ]);
        Detailsoal::create($request->all());
        return redirect('soal/details/'.$soal->id)->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function storedistribusi(Request $request, Coba $coba, Soal $soal)
    {
        Distribusisoal::create([
            'soal_id' => $soal->id,
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect('soal/details/'.$soal->id)->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function destroydistribusi(Distribusisoal $distribusisoal)
    {
       $distribusisoal->delete();
        return redirect('soal')->with('sukses', 'Data Berhasil Dihapus');
    }
    public function detailsoal(Detailsoal $detailsoal)
    {
        return view('soal.detailSoal', compact('detailsoal'));
    }
    public function updatesoal(Request $request, Detailsoal $detailsoal)
    {
        $detailsoal->update($request->all());
        return redirect ('soal/details/data-soal/'.$detailsoal->id);
    }
}
