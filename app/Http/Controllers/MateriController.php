<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Buku;
use App\User;
use App\Auth;
use Storage;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_materi = Materi::all();
        $list_buku = Buku::all();
        return view('materi.index', compact('list_materi', 'list_buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        return view('materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
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
