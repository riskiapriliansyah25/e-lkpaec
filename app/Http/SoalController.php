<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Buku;
use App\Detailsoal;
use App\Materi;


class SoalController extends Controller
{
    /* Soal Ujian */
    public function index()
    {
        $list_soal = Soal::all();
        $list_buku = Buku::all();
        return view('soal.index', compact('list_soal', 'list_buku'));
    }
    public function store(Request $request)
    {
        $request->request->add([
            'user_id' => auth()->user()->id,
        ]);
        Soal::create($request->all());
        return redirect ('soal')->with('sukses', 'Soal telah ditambah');
    }
    public function delete(Soal $soal)
    {
        Soal::destroy($soal->id);
        return redirect('soal')->with('sukses', 'Soal telah dihapus');
    }
    /* public function detailSoal(Soal $soal)
    {
        return$detail_soal = Detailsoal::where('id_soal', '=', $soal->id)->get();
        return view('soal.detail', compact('soal','detail_soal'));
    } */
    public function storedetailSoal(Request $request, Soal $soal)
    {
        $request->validate([
            'audio' => 'mimes:mp3',
        ]);
        $request->request->add([
            'id_soal' => $soal->id,
            'jenis' => $soal->jenis,
            'id_user' => auth()->user()->id,
        ]);
        $input = $request->all();
        //upload soal audio
        if($request->hasFile('audio')){
            $audio = $request->file('audio');
            $ext = $audio->getClientOriginalName();
            if($request->file('audio')->isValid()){
                $audio_name = date('YmdHis'). "$ext";
                $upload_path = 'audio';
                $request->file('audio')->move($upload_path, $audio_name);
                $input['audio'] = $audio_name;
            }
        }
        Detailsoal::create($input);
        return redirect('soal/details/'.$soal->id)->with('sukses', 'Data Berhasil Ditambahkan');
    }
    /* End Soal Ujian */

    /* Soal Latihan */
    public function indexLatihan()
    { 
        return ('halo');
    }
    /* End Soal Latihan */
}
