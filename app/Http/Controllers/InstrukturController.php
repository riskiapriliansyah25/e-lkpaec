<?php

namespace App\Http\Controllers;
use Storage;
use App\Instruktur;
use App\Coba;
use App\User;
use App\Auth;
use App\Siswa;
use PDF;
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
        $no_terakhir = $no_urut_akhir + 1;
        $nii = $no_urut_akhir + 1;
        //$nii = "2000".$no_terakhir;
        return view('instruktur.index', compact('title', 'list_instruktur', 'jumlah_instruktur', 'nii'));
    }
    public function laporan()
    {
        $list_instruktur = Instruktur::all();
        return view('instruktur.laporan', compact('list_instruktur'));
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
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
            'pendidikan_terakhir' => 'required',
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tgl_mulai_bertugas' => 'required',
            'foto' => 'sometimes',
        ]);

        $user = new User;
        $user->role = 'instruktur';
        $user->name = $request->nama;
        $user->username = $request->nii;
        $user->password = bcrypt('secret');
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
        $input  = $request->all();

        $request->validate([
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);
        
        //Avatar. Cek adakah foto?
        if($request->hasFile('foto')){
            //Hapus Foto lama jika ada foto baru.
            $exist = Storage::disk('foto_instruktur')->exists($instruktur->foto);
            if(isset($instruktur->foto) && $exist){
                $delete = Storage::disk('foto_instruktur')->delete($instruktur->foto);
            }
            //upload foto baru.
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = "img/instruktur";
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }
        $instruktur->update($input);
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
        //Hapus Foto Kalau Ada
        $exist =Storage::disk('foto_instruktur')->exists($instruktur->foto);
        if(isset($instruktur->foto) && $exist){
            $delete = Storage::disk('foto_instruktur')->delete($instruktur->foto);
        }
        Instruktur::destroy($instruktur->id);
        return redirect('instruktur')->with('sukses', 'Data Berhasil Dihapus');
    }
    public function exportPdf()
    {
        $tahun = date('YmdHis');
        $list_instruktur = Instruktur::all();
        $pdf = PDF::loadview('export.instrukturpdf', compact('list_instruktur'));
        return $pdf->download($tahun.'_daftar_instruktur.pdf');
    }
    public function exportPdfinstruktur(Instruktur $instruktur)
    {
        $pdf = PDF::loadview('export.getinstrukturpdf', compact('instruktur'));
        return $pdf->download($instruktur->nii.$instruktur->nama.'_instruktur.pdf');
    }
}
