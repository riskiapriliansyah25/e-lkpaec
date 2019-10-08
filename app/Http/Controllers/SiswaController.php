<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use App\Siswa;
use App\Buku;
use App\User;
use App\Coba;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Siswa';
        $list_siswa = Siswa::all();
        $list_buku  = Buku::all();
        $list_kelas = Coba::all();
        
        $jumlah_siswa = Siswa::count();
        $noUrutAkhir = Siswa::max('nis');
        $nis_siswa = $noUrutAkhir +1;
        return view('siswa.index', compact('title', 'list_siswa', 'jumlah_siswa', 'list_buku', 'nis_siswa', 'list_kelas'));
    }
    /* public function cari(Request $request)
    {
        $title = 'siswa';
        $list_paket = Paket::all();
        $list_buku = Buku::all();
        $kata_kunci = $request->input('kata_kunci');
        $query = Siswa::where('nama', 'LIKE', '%'.$kata_kunci.'%');
        $list_siswa = $query->paginate(5);
        $pagination = $list_siswa->appends($request->except('page'));
        $jumlah_siswa = $list_siswa->total();
        return view('siswa.index', compact('list_siswa', 'kata_kunci', 'pagination', 'jumlah_siswa', 'title', 'list_paket', 'list_buku'));
    } */

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
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->avatar = null;
        $user->username = $request->nis;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add([
            'user_id' => $user->id,
        ]);

        Siswa::create($request->all());
        return redirect('siswa')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $title = "Details";
        $coba = $siswa->nama;
        return view('siswa.show', compact('siswa', 'title', 'coba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $title = 'Edit Data';
        $list_buku = Buku::all();
        $list_kelas = Coba::all();
        return view('siswa.edit', compact('siswa', 'title', 'list_buku', 'list_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $input  = $request->all();

        $request->validate([
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        //Avatar. Cek adakah foto?
        if($request->hasFile('foto')){
            //Hapus Foto lama jika ada foto baru.
            $exist = Storage::disk('foto_siswa')->exists($siswa->foto);
            if(isset($siswa->foto) && $exist){
                $delete = Storage::disk('foto_siswa')->delete($siswa->foto);
            }
            //upload foto baru.
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = "img/siswa";
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }
        $siswa->update($input);
        return redirect('siswa')->with('sukses', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        User::destroy($siswa->user_id);
        //Hapus Foto Kalau Ada
        $exist =Storage::disk('foto_siswa')->exists($siswa->foto);
        if(isset($siswa->foto) && $exist){
            $delete = Storage::disk('foto_siswa')->delete($siswa->foto);
        }
     
        $siswa->delete();
        return redirect('siswa')->with('sukses', 'Data Telah Dihapus');
    }

}
