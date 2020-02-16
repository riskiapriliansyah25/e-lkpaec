<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Siswa;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Paket";
        $list_paket = Paket::all();
        return view('paket.index', compact('list_paket'));
    }
    /* public function cari(Request $request)
    {
        $title = 'Paket';
        $kata_kunci = $request->input('kata_kunci');
        $query = Paket::where('nama_paket', 'LIKE', '%'.$kata_kunci.'%');
        $list_paket = $query->paginate(2);
        $pagination = $list_paket->appends($request->except('page'));
        $jumlah_paket = $list_paket->total();
        return view('paket.index', compact('title', 'list_paket', 'kata_kunci', 'pagination', 'jumlah_paket'));
    }
 */
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
            'nama_paket' => 'required',
            'harga' => 'required',
        ]);
        Paket::create($request->all());
        return redirect('paket')->with('sukses', 'Data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    { 
        return view('paket.show', compact('paket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $paket->update($request->all());
        return redirect('paket')->with('sukses', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id);
        return redirect('paket')->with('sukses', 'Data Telah Dihapus');
    }
}
