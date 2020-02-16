<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Coba;
use App\Buku;
use App\Distribusimateri;
use App\User;
use App\Auth;
use Storage;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $list_materi = Materi::all();
        }else{
            $list_materi = Materi::where('user_id', '=', auth()->user()->id)->get();
        }
        $list_buku = Buku::all();
        return view('materi.index', compact('list_materi', 'list_buku'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {  
        $request->validate([
            'judul' => 'required',
            'buku_id' => 'required',
            'materi' => 'mimes:pdf',
            'deskripsi' => 'sometimes',
        ]);
        $request->request->add([
            'slug' => str_slug($request->judul),
            'user_id' => auth()->user()->id,
            ]);    
            $input = $request->all();
            //Upload PDF
            if($request->hasFile('materi')){
                $materi = $request->file('materi');
                $ext = $materi->getClientOriginalName();
                if($request->file('materi')->isValid()){
                    $materi_name = date('YmdHis'). "$ext";
                    $upload_path = 'materi';
                    $request->file('materi')->move($upload_path, $materi_name);
                    $input['materi'] = $materi_name;
                }
            }
        Materi::create($input);
        return redirect('materii')->with('sukses', 'Data telah ditambah');
    }
    public function storeDistribusiMateri(Request $request)
    {
        $distribusi = new Distribusimateri;
        $distribusi->materi_id = $request->materiId;
        $distribusi->kelas_id = $request->kelasId;
        $distribusi->user_id = auth()->user()->id;
        $check = Distribusimateri::where('materi_id', $request->materiId)->where('kelas_id', $request->kelasId)->first();
        if($check){
            return 0;
        }else{
            $distribusi->save();
        }
    }
    public function deleteDistribusiMateri(Request $request)
    {
        $id = $request->distId;
        Distribusimateri::destroy($id);
    }

    public function show(Materi $materi)
    {
        if(auth()->user()->role == 'instruktur'){
            $list_kelas = Coba::where('instruktur_id', auth()->user()->instruktur->id)->get();
            $list_distribusi = Distribusimateri::where('user_id', auth()->user()->id)->get();
        }else{
            $list_kelas = Coba::all();
            $list_distribusi = Distribusimateri::all();
        }
        return view('materi.show', compact('materi', 'list_kelas', 'list_distribusi'));
    }

    public function edit(Materi $materi)
    {
        $list_buku = Buku::all();
        return view('materi.ubah', compact('materi', 'list_buku'));
    }

  
    public function update(Request $request, Materi $materi)
    {
        $request->request->add([
            'slug' => str_slug($request->judul),
            'user_id' => auth()->user()->id,
        ]);
        $materi->update($request->all());
        return redirect('materii')->with('sukses', 'Data telah diubah');
    }

    public function destroy(Materi $materi)
    {
        //hapus file jika ada
        $exist = Storage::disk('materi')->exists($materi->materi);
        if(isset($materi->materi) && $exist){
            $delete = Storage::disk('materi')->delete($materi->materi);
        }
        $materi->delete();
        return redirect('materii')->with('sukses', 'Data Berhasil dihapus');
    }
}
