<?php

namespace App\Http\Controllers;

Use App\Daftar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $halaman = 'home';
        return view('home.index', compact('halaman'));
    }
    public function daftar()
    {
        return view('home.daftar');
    }
    public function store(Request $request)
    {
        Daftar::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => 0,
        ]);
        return redirect ('daftar')->with('sukses', 'Anda Berhasil Terdaftar');
    }
}
