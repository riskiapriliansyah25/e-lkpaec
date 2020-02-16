<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coba;
use App\Siswa;
use App\Soal;
use App\Soallatihan;
use App\Buku;
use App\Detailsoal;
use App\Detailsoallatihan;
use App\Distribusisoal;
use App\Distribusisoallatihan;
use App\Materi;
use Storage;

class SoallController extends Controller
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
        $request->validate([
            'buku_id' => 'required',
            'jenis' => 'required',
            'waktu' => 'required',
        ]);
        $request->request->add([
            'id_user' => auth()->user()->id,
        ]);
        Soal::create($request->all());
        return redirect ('soal')->with('sukses', 'Soal telah ditambah');
    }
    public function editSoal(Soal $soal)
    {
        $list_buku = Buku::all();
        return view('soal.ubahsoal', compact('soal', 'list_buku'));
    }
    public function updateSoal(Request $request, Soal $soal)
    {
        $soal->update($request->all());
        return redirect('soal')->with('sukses', 'Data telah diubah');
    }
    public function delete(Soal $soal)
    {
        Soal::destroy($soal->id);
        Detailsoal::where('id_soal', $soal->id)->delete();
        Distribusisoal::where('id_soal', $soal->id)->delete();
        return redirect('soal')->with('sukses', 'Soal telah dihapus');
    }
    public function detailSoal(Soal $soal)
    {
        $detail_soal = Detailsoal::where('id_soal', '=', $soal->id)->get();
        $jumlah_soal = Detailsoal::where('id_soal', '=', $soal->id)->count();
        $jumlah = $jumlah_soal + 1;
        return view('soal.detail', compact('soal','detail_soal', 'jumlah'));
    }
    public function deleteDetailSoal(Soal $soal, Detailsoal $detailsoal)
    {
        //Hapus audio Kalau Ada
        $exist =Storage::disk('audio')->exists($detailsoal->audio);
        if(isset($detailsoal->audio) && $exist){
            $delete = Storage::disk('audio')->delete($detailsoal->audio);
        }
        //Hapus gambar Kalau Ada
        $exist =Storage::disk('gambar')->exists($detailsoal->gambar);
        if(isset($detailsoal->gambar) && $exist){
            $delete = Storage::disk('gambar')->delete($detailsoal->gambar);
        }
        Detailsoal::destroy($detailsoal->id);
        return redirect('soal/details/'.$soal->id)->with('sukses', 'Soal berhasil dihapus');
    }
    public function distribusiSoal(Soal $soal)
    {
        $list_distribusi = Distribusisoal::where('id_soal', $soal->id)->get();
        $list_siswa = Siswa::where('status', 1)->get();
        return view('soal.distribusisoal', compact('soal','list_distribusi', 'list_siswa'));
    }
    public function storeDistribusi(Request $request)
    {
        $check = Distribusisoal::where('id_soal', $request->soalId)->where('id_siswa', $request->siswaId)->first();
        if($check){
            return 0;
        }else{
        $distribusi = new Distribusisoal;
        $distribusi->id_soal = $request->soalId;
        $distribusi->id_siswa = $request->siswaId;
        $distribusi->id_user = $request->userId;
        $distribusi->save();    
        }
        
    }
    public function deleteDistribusiUjian(Request $request)
    {
        $id = $request->distId;
       Distribusisoal::destroy($id);
    }

    public function storedetailSoal(Request $request, Soal $soal)
    {
      $request->validate([
          'soal' => 'sometimes',
          'audio' => 'sometimes',
          'gambar' => 'image|mimes:jpeg,jpg,png',
          'pila' => 'required',
          'pilb' => 'required',
          'pilc' => 'required',
          'pild' => 'required',
          'pile' => 'sometimes',
          'kunci' => 'required',
          'score' => 'required',
          'status' => 'required',
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
                $upload_path = 'kumpulansoal/audio';
                $request->file('audio')->move($upload_path, $audio_name);
                $input['audio'] = $audio_name;
            }
        }
        //upload soal gambar
        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalName();
            if($request->file('gambar')->isValid()){
                $gambar_name = date('YmdHis'). "$ext";
                $upload_path = 'kumpulansoal/gambar';
                $request->file('gambar')->move($upload_path, $gambar_name);
                $input['gambar'] = $gambar_name;
            }
        }
        Detailsoal::create($input);
        return redirect('soal/details/'.$soal->id)->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function showDetailSoal(Soal $soal, Detailsoal $detailsoal)
    {
        return view('soal.getdetail', compact('detailsoal', 'soal'));
    }
    public function updateDetailSoal(Request $request, Soal $soal, Detailsoal $detailsoal)
    {
        $input  = $request->all();
        //audio
        if($request->hasFile('audio')){
            //Hapus Audio lama jika ada audio baru.
            $exist = Storage::disk('audio')->exists($detailsoal->audio);
            if(isset($detailsoal->audio) && $exist){
                $delete = Storage::disk('audio')->delete($detailsoal->audio);
            }
            //upload audio baru.
            $audio = $request->file('audio');
            $ext = $audio->getClientOriginalName();
            if($request->file('audio')->isValid()){
                $audio_name = date('YmdHis'). "$ext";
                $upload_path = 'kumpulansoal/audio';
                $request->file('audio')->move($upload_path, $audio_name);
                $input['audio'] = $audio_name;
            }
        }
        //Gambar
        if($request->hasFile('gambar')){
            //Hapus gambar lama jika ada gambar baru.
            $exist = Storage::disk('gambar')->exists($detailsoal->gambar);
            if(isset($detailsoal->gambar) && $exist){
                $delete = Storage::disk('gambar')->delete($detailsoal->gambar);
            }
            //upload gambar baru.
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalName();
            if($request->file('gambar')->isValid()){
                $gambar_name = date('YmdHis'). "$ext";
                $upload_path = 'kumpulansoal/gambar';
                $request->file('gambar')->move($upload_path, $gambar_name);
                $input['gambar'] = $gambar_name;
            }
        }
        $detailsoal->update($input);
        return redirect('soal/details/data-soal/'.$soal->id.'/'.$detailsoal->id)->with('sukses', 'Data telah diubah');
    }
    /* End Soal Ujian */

    /* Soal Latihan */
    public function indexLatihan()
    {
        $list_buku = Buku::all();
        $list_materi = Materi::all();
        $list_latihan = Soallatihan::all();
        $soal_instruktur = Soallatihan::where('id_user', '=', auth()->user()->id)->get();
        return view('soal.indexlatihan', compact('list_latihan', 'list_buku', 'list_materi', 'soal_instruktur'));
    }
    public function storeLatihan(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'materi_id' => 'required',
            'jenis' => 'required',
            'waktu' => 'required',
        ]);

        $request->request->add([
            'id_user' => auth()->user()->id,
        ]);
        Soallatihan::create($request->all());
        return redirect ('soal-latihan')->with('sukses', 'Soal telah ditambah');  
    }
    public function detailSoalLatihan(Soallatihan $soallatihan)
    {
        $detail_soal_latihan = Detailsoallatihan::where('id_soal', '=', $soallatihan->id)->get();
        $jumlah_soal = Detailsoallatihan::where('id_soal', '=', $soallatihan->id)->count();
        $jumlah = $jumlah_soal + 1;
        if(auth()->user()->role == 'instruktur'){
            $list_kelas = Coba::where('instruktur_id', '=', auth()->user()->instruktur->id)->get();
            $list_distribusi = Distribusisoallatihan::where('id_user', auth()->user()->id)->get();
        }else {
            $list_distribusi = Distribusisoallatihan::where('id_soal', $soallatihan->id)->get();
            $list_kelas = Coba::all();
        }
        return view('soal.detaillatihan', compact('soallatihan','detail_soal_latihan', 'list_kelas', 'list_distribusi', 'jumlah'));
    }
    public function editSoalLatihan(Soallatihan $soallatihan)
    {
        $list_buku = Buku::all();
        $list_materi = Materi::all();
        return view('soal.ubahsoallatihan', compact('soallatihan', 'list_buku', 'list_materi'));
    }
    public function updateSoalLatihan(Request $request, Soallatihan $soallatihan)
    {
        $soallatihan->update($request->all());
        return redirect('soal-latihan')->with('sukses', 'Data telah diubah');
    }
    public function storedetailSoalLatihan(Request $request, Soallatihan $soallatihan)
    {
        $request->validate([
            'soal' => 'sometimes',
            'audio' => 'sometimes',
            'gambar' => 'image|mimes:jpeg,jpg,png',
            'pila' => 'required',
            'pilb' => 'required',
            'pilc' => 'required',
            'pild' => 'required',
            'pile' => 'sometimes',
            'kunci' => 'required',
            'score' => 'required',
            'status' => 'required',
        ]);
        $request->request->add([
            'id_soal' => $soallatihan->id,
            'jenis' => $soallatihan->jenis,
            'id_user' => auth()->user()->id,
        ]);
        $input = $request->all();
        //upload soal audio
        if($request->hasFile('audio')){
            $audio = $request->file('audio');
            $ext = $audio->getClientOriginalName();
            if($request->file('audio')->isValid()){
                $audio_name = date('YmdHis'). "$ext";
                $upload_path = 'kumpulansoal/audio';
                $request->file('audio')->move($upload_path, $audio_name);
                $input['audio'] = $audio_name;
            }
        }
        //upload soal gambar
        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalName();
            if($request->file('gambar')->isValid()){
                $gambar_name = date('YmdHis'). "$ext";
                $upload_path = 'kumpulansoal/gambar';
                $request->file('gambar')->move($upload_path, $gambar_name);
                $input['gambar'] = $gambar_name;
            }
        }
        Detailsoallatihan::create($input);
        return redirect('soal-latihan/details/'.$soallatihan->id)->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function distribusiLatihan(Request $request)
    {
        $check = Distribusisoallatihan::where('id_soal', $request->soalId)->where('id_kelas', $request->kelasId)->first();
        if($check){
            return 0;
        }else{
         $distribusi = new Distribusisoallatihan;
        $distribusi->id_soal = $request->soalId;
        $distribusi->id_kelas = $request->kelasId;
        $distribusi->id_user = $request->userId;
        $distribusi->save();   
        }
        
    }
    public function deleteLatihan(Soallatihan $soallatihan)
    {
        Soallatihan::destroy($soallatihan->id);
        Detailsoallatihan::where('id_soal', $soallatihan->id)->delete();
        Distribusisoal::where('id_soal', $soallatihan->id)->delete();
        return redirect('soal-latihan')->with('sukses', 'Data telah dihapus');
    }
    public function deleteDistribusi(Request $request)
    {
        $id = $request->distId;
       Distribusisoallatihan::destroy($id);
    }
    public function deleteDetailSoalLatihan(Soallatihan $soallatihan, Detailsoallatihan $detailsoallatihan)
    {
      //Hapus audio Kalau Ada
      $exist =Storage::disk('audio')->exists($detailsoallatihan->audio);
      if(isset($detailsoallatihan->audio) && $exist){
          $delete = Storage::disk('audio')->delete($detailsoallatihan->audio);
      }
      //Hapus gambar Kalau Ada
      $exist =Storage::disk('gambar')->exists($detailsoallatihan->gambar);
      if(isset($detailsoallatihan->gambar) && $exist){
          $delete = Storage::disk('gambar')->delete($detailsoallatihan->gambar);
      }
      Detailsoallatihan::destroy($detailsoallatihan->id);
      return redirect('soal-latihan/details/'.$soallatihan->id)->with('sukses', 'Soal berhasil dihapus');
    }
    public function showDetailSoalLatihan(Soallatihan $soallatihan, Detailsoallatihan $detailsoallatihan)
    {
        return view('soal.getdetaillatihan', compact('detailsoallatihan', 'soallatihan'));
    }
    public function updateDetailSoalLatihan(Request $request, Soallatihan $soallatihan, Detailsoallatihan $detailsoallatihan)
    {
        $input  = $request->all();
        //audio
        if($request->hasFile('audio')){
            //Hapus Audio lama jika ada audio baru.
            $exist = Storage::disk('audio')->exists($detailsoallatihan->audio);
            if(isset($detailsoallatihan->audio) && $exist){
                $delete = Storage::disk('audio')->delete($detailsoallatihan->audio);
            }
            //upload audio baru.
            $audio = $request->file('audio');
            $ext = $audio->getClientOriginalName();
            if($request->file('audio')->isValid()){
                $audio_name = date('YmdHis'). "$ext";
                $upload_path = 'kumpulansoal/audio';
                $request->file('audio')->move($upload_path, $audio_name);
                $input['audio'] = $audio_name;
            }
        }
        //Gambar
        if($request->hasFile('gambar')){
            //Hapus gambar lama jika ada gambar baru.
            $exist = Storage::disk('gambar')->exists($detailsoallatihan->gambar);
            if(isset($detailsoallatihan->gambar) && $exist){
                $delete = Storage::disk('gambar')->delete($detailsoallatihan->gambar);
            }
            //upload gambar baru.
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalName();
            if($request->file('gambar')->isValid()){
                $gambar_name = date('YmdHis'). "$ext";
                $upload_path = 'kumpulansoal/gambar';
                $request->file('gambar')->move($upload_path, $gambar_name);
                $input['gambar'] = $gambar_name;
            }
        }
        $detailsoallatihan->update($input);
        return redirect('soal-latihan/details/data-soallatihan/'.$soallatihan->id.'/'.$detailsoallatihan->id)->with('sukses', 'Data telah diubah');
    }
    /* End Soal Latihan */
}
