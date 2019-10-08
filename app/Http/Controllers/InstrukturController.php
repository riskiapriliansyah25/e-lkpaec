<?php

namespace App\Http\Controllers;

use App\Instruktur;
use App\Coba;
use App\User;
use App\Auth;
use App\Siswa;
use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Instruktur';
        $jumlah_instruktur = Instruktur::count();
        $list_instruktur = Instruktur::all();
        $no_urut_akhir = Instruktur::max('nii');
        $nii = $no_urut_akhir + 1;
        return view('instruktur.index', compact('title', 'list_instruktur', 'jumlah_instruktur', 'nii'));
    }
    public function kelas()
    {
        $instruktur = Instruktur::where('user_id', '=' , auth()->user()->id)->get();
        $instruktur_id = $instruktur->pluck('id');
        $list_kelas = Coba::where('instruktur_id', '=' , $instruktur_id )->get();
        return view('instruktur.kelas', compact('list_kelas'));
    }
    public function showkelas($id)
    {
        $kelas_ajar = Coba::findOrFail($id);
        $list_siswa = Siswa::where([['kelas_id' , '=', $id], ['status', '=' , 1]])->get();
        return view('instruktur.showkelas', compact('kelas_ajar','list_siswa'));
    }
    public function cari(Request $request)
    {
        $title = 'Instruktur';
        $kata_kunci = $request->input('kata_kunci');
        $query = Instruktur::where('nama', 'LIKE', '%'.$kata_kunci.'%');
        $list_instruktur = $query->paginate(5);
        $pagination = $list_instruktur->appends($request->except('page'));
        $jumlah_instruktur = $list_instruktur->total();
        return view('instruktur.index', compact('list_instruktur', 'kata_kunci', 'pagination', 'jumlah_instruktur', 'title'));
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
        
        $user = new User;
        $user->role = 'instruktur';
        $user->name = $request->nama;
        $user->avatar = null;
        $user->username = $request->nii;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add([
            'user_id' => $user->id,
            'foto' => null,
        ]);

        Instruktur::create($request->all());
        return redirect('instruktur')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instruktur  $instruktur
     * @return \Illuminate\Http\Response
     */
    public function show(Instruktur $instruktur)
    {
        $title = 'Details Instruktur';
        return view('instruktur.show', compact('instruktur', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instruktur  $instruktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Instruktur $instruktur)
    {
        $title = "Edit Instruktur";
        return view('instruktur.edit', compact('title', 'instruktur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instruktur  $instruktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instruktur $instruktur)
    {
        $instruktur->update($request->all());
        return redirect('instruktur')->with('sukses', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instruktur  $instruktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instruktur $instruktur)
    {
        User::destroy($instruktur->user_id);
        Instruktur::destroy($instruktur->id);
        return redirect('instruktur')->with('sukses', 'Data Berhasil Dihapus');
    }
}
