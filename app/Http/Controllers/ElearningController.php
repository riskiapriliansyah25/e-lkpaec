<?php

namespace App\Http\Controllers;

use App\Detailsoal;
use Illuminate\Http\Request;
use App\Materi;
use App\Distribusimateri;
use App\Distribusisoal;
use Storage;
class ElearningController extends Controller
{
    public function index()
    {
        return view('e-learning.index');
    }
    public function materi()
    {
        $list_distribusi = Distribusimateri::where('kelas_id', auth()->user()->siswa->kelas_id)->get();
        return view('e-learning.materi', compact('list_distribusi'));
    }
    
    public function uploadmateri(Request $request)
    {
        
        $materi = $request->file('materi');
            $ext = $materi->getClientOriginalExtension();
            if($request->file('materi')->isValid()){
                $materi_name = date('YmdHis'). ".$ext";
                $upload_path = "materi";
                $request->file('materi')->move($upload_path, $materi_name);
                $input['materi'] = $materi_name;
            }
    }
    public function materiShow(Materi $materi)
    {
        return view('e-learning.showmateri', compact('materi'));
    }
    public function profile()
    {
        return view('e-learning.profile');
    }
    public function updateProfile(Request $request)
    {
        $input  = $request->all();

        $request->validate([
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        //Avatar. Cek adakah foto?
        if($request->hasFile('foto')){
            //Hapus Foto lama jika ada foto baru.
            $exist = Storage::disk('foto_siswa')->exists(auth()->user()->siswa->foto);
            if(isset(auth()->user()->siswa->foto) && $exist){
                $delete = Storage::disk('foto_siswa')->delete(auth()->user()->siswa->foto);
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

        auth()->user()->siswa->update($input);
        return redirect('e-learning/profile')->with('sukses', 'Data Berhasil Diperbarui');
    }
    public function gantiPassword()
    {
        return view('e-learning.gantiPassword');
    }
    public function updatePassword(Request $request)
    {
        $password_lama = $request->password_lama;
        $password_baru = $request->password_1;
        $password_baru2 = $request->password_2;
        $password = auth()->user()->password;
       if(!password_verify($password_lama,  $password)){
           return redirect ('e-learning/profile/gantipassword')->with('gagal','Password Salah');
       }else{
           if($password_lama == $password_baru){
            return redirect ('e-learning/profile/gantipassword')->with('gagal', 'Sama dengan Password Baru');
        }else{
            if($password_baru != $password_baru2){
                return redirect ('e-learning/profile/gantipassword')->with('gagal','Password Baru Tidak Sama');
               }else{
               auth()->user()->update([
                   'password' => bcrypt($request->password_1),
               ]);
               return redirect ('e-learning/profile/gantipassword')->with('sukses', 'Password telah diganti');
            }
         }
        }
    }
}
