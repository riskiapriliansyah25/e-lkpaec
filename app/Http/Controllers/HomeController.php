<?php

namespace App\Http\Controllers;

Use App\Daftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required',
        ]);
        Daftar::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => 0,
        ]);

        $email = $request->email;
        $data = array(
            'name' => $request->nama,
            'email_body' => 'Selamat anda telah terdaftar di Active English Course, untuk proses registrasi ulang dan langkah selanjutnya diharapkan datang ketempat kursus di Jl. Awang Long Senopati RT.01 No.19 Kel-Sukarame Kec-Tenggarong KALTIM 75515 Telp. 0541-661781. Kami tunggu yaa, Salam hangat dari kami LKP Active English Course',
        );
        //kirim email
        Mail::send('layouts/email_template', $data, function($mail) use($email){
            $mail->to($email, 'no-reply')->subject("Pendaftaran siswa baru");
            $mail->from('e.lkpaec@gmail.com', 'E-lkpaec');
        });

        /* if(Mail::failures()){
            return "Gagal mengirim email";
        }else{
            return "Email berhasil dikirim!";
        } */

        return redirect ('daftar')->with('sukses', 'Anda Berhasil Terdaftar, untuk proses selanjutnya silahkan datang ketempat kursus untuk melakukan registrasi ulang');
    }
}
