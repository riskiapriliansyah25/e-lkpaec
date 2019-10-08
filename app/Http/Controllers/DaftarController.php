<?php

namespace App\Http\Controllers;

use App\Daftar;
use App\Paket;
use App\Buku;
use App\Siswa;
use App\User;
use App\Coba;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pendaftar';
        $daftar = Daftar::all();
        return view('daftar.index', compact('title', 'daftar'));
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
    public function store(Request $request, Daftar $daftar)
    {
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'buku_id' => 'required',
            'kelas_id' => 'required',
            'foto' => 'sometimes',
        ]);
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->username = $request->nis;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add([
            'user_id' => $user->id,
            'foto' => null,
        ]);
        Siswa::create($request->all());
        $daftar->update([
            'status' => $request->status,
        ]);
        return redirect('siswa')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function register(Daftar $daftar)
    {
        $title = 'Registrasi';
        $list_kelas = Coba::all();
        $list_buku = Buku::all();
        $noUrutAkhir = Siswa::max('nis');
        $tahun = date('y');
            $nis_siswa = $noUrutAkhir+1;

        return view('daftar.register', compact ('daftar', 'title', 'list_buku', 'nis_siswa', 'list_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        Daftar::destroy($daftar->id);
        return redirect('pendaftar')->with('sukses', 'Data Berhasil Dihapus');
    }
}
