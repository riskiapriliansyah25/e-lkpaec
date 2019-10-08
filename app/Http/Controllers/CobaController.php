<?php

namespace App\Http\Controllers;

use App\Coba;
use App\Instruktur;
use App\Siswa;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Kelas";
        $list_kelas = Coba::paginate(5);
        $list_instruktur = Instruktur::all();
        return view('coba.index', compact('title', 'list_instruktur', 'list_kelas', 'list_siswa'));
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
        Coba::create($request->all());
        return redirect('coba')->with('sukses', 'Data telah ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function show(Coba $coba)
    {
        $title = "Kelas";
        $list_kelas = Coba::all();
        $list_instruktur = Instruktur::all();
        $list_siswa = Siswa::where([['kelas_id' , '=', $coba->id], ['status', '=' , 1]])->get();
        return view('coba.show', compact('coba', 'title', 'list_instruktur', 'list_kelas', 'list_siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function edit(Coba $coba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coba $coba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coba $coba)
    {
        //
    }
}
