<?php

namespace App\Http\Controllers;

use App\Daftar;
use App\Paket;
use App\Buku;
use App\Siswa;
use App\User;
use App\Coba;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    
    public function exportPdf()
    {
        $tahun = date('YmdHis');
        $list_pendaftar = Daftar::all();
        $pdf = PDF::loadview('export.pendaftarpdf', compact('list_pendaftar'));
        return $pdf->download($tahun.'_daftar_pendaftar.pdf');
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
            'buku_id' => 'sometimes',
            'kelas_id' => 'sometimes',
            'status' => 'required',
            'foto' => 'sometimes',
        ]);
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $daftar->email;
        $user->username = $request->nis;
        $user->password = bcrypt('123456');
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

        $email = $daftar->email;
        $data = array(
            'name' => $request->nama,
            'email_body' => '<p>Anda telah terdaftar sebagai siswa di LKP Active English Couse</p><p>Username anda <b>'.$request->nis.'</b> dan Password Anda <b>123456</b>. harap ganti password anda segera, Terimakasih. <br> <p>Silahkan Kunjungi: http://e-lkpaec.online/public/e-learning/login</p>',
        );
        //kirim email
        Mail::send('layouts/email_template', $data, function($mail) use($email){
            $mail->to($email, 'no-reply')->subject("Pendaftaran siswa baru");
            $mail->from('e.lkpaec@gmail.com', 'E-lkpaec');
        });

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
       return view('daftar.show', compact('daftar'));
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
            $no_terakhir =$noUrutAkhir+1;
            $nis_siswa =$noUrutAkhir+1;
            //$nis_siswa = $tahun."000".$no_terakhir;

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
