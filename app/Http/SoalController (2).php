<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Soal;
use App\Soaltespenempatan;
use App\Soalujian;
use App\Distribusisoal;
use App\Coba;
use App\Detailsoal;
use App\Detailsoaltes;
use App\Detailsoalujian;
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
    public function indextes()
    {
        $soal_admin = Soaltespenempatan::all();
        $list_buku = Buku::all();
        return view('soal.soaltes', compact('soal_admin', 'list_buku'));
    }
    public function indexujian()
    {
        $list_soal = Soalujian::all();
        $list_buku = Buku::all();
        return view('soal.soalujian', compact('list_soal', 'list_buku'));
    }
    public function storesoal(Request $request)
    {
        $request->request->add([
            'user_id' => auth()->user()->id,
        ]);
        Soal::create($request->all());
        return redirect('soal')->with('sukses','Data Berhasil Ditambahkan');
    }
    public function storesoaltes (Request $request)
    {
        $request->request->add([
            'user_id' => auth()->user()->id,
        ]);
        Soaltespenempatan::create($request->all());
        return redirect('soaltes')->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function storesoalujian (Request $request)
    {
        $request->request->add([
            'user_id' => auth()->user()->id,
        ]);
        Soalujian::create($request->all());
        return redirect('soalujian')->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function details(Soal $soal)
    {
        $list_kelas = Coba::all();
        if(auth()->user()->role == 'instruktur'){
            $instruktur_id = auth()->user()->instruktur->id;
            $kelas_ajar = Coba::where('instruktur_id', '=', $instruktur_id)->get();
        }
        $distribusi_soal = Distribusisoal::where('user_id', '=', auth()->user()->id)->get();
        $detail_soal = Detailsoal::where('soal_id', '=', $soal->id)->get();
        return view('soal.detail', compact('soal', 'detail_soal', 'list_kelas', 'kelas_ajar', 'distribusi_soal'));
    }
    public function detailsTes(Soaltespenempatan $soaltespenempatan)
    {
        $list_kelas = Coba::all();
        $list_siswa = Siswa::where('status', '=', '1')->get();
        $detail_soal = Detailsoaltes::where('soal_id', '=', $soaltespenempatan->id)->get();
        return view ('soal.detailtes', compact('soaltespenempatan', 'list_kelas', 'distribusisoaltes', 'detail_soal', 'list_siswa'));
    }
    /* public function detailsUjian(Soalujian $soalujian)
    {
        $list_siswa = Siswa::where('status', '=', '1')->get();
        $detail_soal = Detailsoalujian::where('soal_id', '=', $soalujian->id)->get();
        $list_kelas = Coba::all();
        return view('soal.detailujian', compact('soalujian', 'list_siswa', 'detail_soal', 'list_kelas'));
    } */
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
    public function storedetailstes(Request $request, Soaltespenempatan $soaltespenempatan)
    {
        $request->request->add([
            'soal_id' => $soaltespenempatan->id,
            'jenis' => $soaltespenempatan->jenis,
            'user_id' => auth()->user()->id,
        ]);
        Detailsoaltes::create($request->all());
        return redirect('soaltes/details/'.$soaltespenempatan->id)->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function storedetailsujian(Request $request, Soalujian $soalujian)
    {
        $request->request->add([
            'soal_id' => $soalujian->id,
            'jenis' => $soalujian->jenis,
            'user_id' => auth()->user()->id,
        ]);
        Detailsoalujian::create($request->all());
        return redirect('soalujian/details/'.$soalujian->id)->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function storedistribusi(Request $request, Coba $coba, Soal $soal)
    {
        Distribusisoal::create([
            'soal_id' => $soal->id,
            'kelas_id' => $request->kelas_id,
            'user_id' => auth()->user()->id,
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
