<?php

namespace App\Http\Controllers;
use App\Materi;
use App\Soal;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function tespenempatan()
    {
        return view('ujian.tespenempatan');
    }
    public function latihan()
    {
        $list_latihan = Soal::all();
        return view('ujian.latihan', compact('list_latihan', 'judul'));
    }
    public function latihanstore(Request $request, Latihan $id)
    {
        $list_latihan = Latihan::all();
        foreach($list_latihan as $latihan){

            $jawaban = Ljawaban::create([
                'latihan_id' => $request->latihan_id,
                'user_id' => auth()->user()->id,
                'jawaban' => $request->jawaban_.$id,
            ]);
        }
        dd($jawaban);
    }
}
