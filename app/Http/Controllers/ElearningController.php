<?php

namespace App\Http\Controllers;

use App\Detailsoal;
use Illuminate\Http\Request;
use App\Materi;
use App\Soal;
use App\Distribusisoal;
class ElearningController extends Controller
{
    public function index()
    {
        return view('e-learning.index');
    }
    public function materi()
    {
        $list_materi = Materi::all();
        return view('e-learning.materi', compact('list_materi'));
    }
    public function uploadmateri(Request $request)
    {
        
        $materi = $request->file('materi');
            $ext = $materi->getClientOriginalExtension();
            if($request->file('materi')->isValid()){
                $materi_name = date('YmdHis'). ".$ext";
                $upload_path = "materi";
                $request->file('materi')->move($upload_path, $materi_name);
                $input['materi'] = $materi_name;
            }
    }
    public function latihan()
    {
        $distribusisoal = Distribusisoal::where('kelas_id', '=', auth()->user()->siswa->kelas_id)->get();
        return view('e-learning.latihan', compact('distribusisoal'));
    }
    public function soal(Soal $soal)
    {
        $soals = Detailsoal::where('soal_id', '=', $soal->id)->paginate(1);
        return view('halaman-siswa.detail_ujian', compact('soal', 'soals'));
    }
    public function nilai()
    {
        return view('e-learning.nilai');
    }
}
