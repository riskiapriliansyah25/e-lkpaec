<?php

namespace App\Http\Controllers;
use App\User;
use Storage;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function profile(Request $request, User $user)
    {
        
        return view('user.show', compact('user'));
    }
    public function updateprofile(Request $request, User $user)
    {
        $input = $request->all();
        $request->validate([
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png',
        ]);
        //Avatar. Cek adakah foto?
        if($request->hasFile('avatar')){
            //Hapus Foto lama jika ada foto baru.
            $exist = Storage::disk('avatar')->exists($user->avatar);
            if(isset($user->avatar) && $exist){
                $delete = Storage::disk('avatar')->delete($user->avatar);
            }
            //upload foto baru.
            $avatar = $request->file('avatar');
            $ext = $avatar->getClientOriginalExtension();
            if($request->file('avatar')->isValid()){
                $avatar_name = date('YmdHis'). ".$ext";
                $upload_path = "img/user";
                $request->file('avatar')->move($upload_path, $avatar_name);
                $input['avatar'] = $avatar_name;
            }
        }
        $user->update($input);
        return redirect('user/daftar')->with('sukses','Telah diUpdate');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);
        $user = new User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->avatar = null;
        $user->username = $request->username;
        if($user->role == 'siswa'){
            $user->password = bcrypt('123456');
        }else if($user->role == 'instruktur'){
            $user->password = bcrypt('secret');
        }else{
            $user->password= bcrypt('rahasia');
        }
        $user->remember_token = str_random(60);
        $user->save();

        return redirect('user/daftar')->with('sukses', 'User telah ditambah');
    }
    

    public function daftar()
    {
        $list_user = User::all();
        return view('user.daftar', compact('list_user'));
    }
    public function changepassword(User $user)
    {
        return view('user.changepassword', compact('user'));
    }
    public function updatepassword(Request $request, User $user)
    {
        $password_lama = $request->password_lama;
        $password_baru = $request->password_1;
        $password_baru2 = $request->password_2;
        $password = $user->password;
       if(!password_verify($password_lama,  $password)){
           return redirect ('user/'.$user->id.'/changepassword')->with('gagal','Password Salah');
       }else{
           if($password_lama == $password_baru){
            return redirect ('user/'.$user->id.'/changepassword')->with('gagal', 'Sama dengan Password Baru');
        }else{
            if($password_baru != $password_baru2){
                return redirect ('user/'.$user->id.'/changepassword')->with('gagal','Password Tidak Sama');
               }else{
               $user->update([
                   'password' => bcrypt($request->password_1),
               ]);
               if(auth()->user()->role == 'instruktur'){
                   return redirect ('user')->with('sukses', 'Password telah diganti');
               }else{
                   return redirect ('user/daftar')->with('sukses', 'Password telah diganti');
               }
            }
         }
        }
    }
    public function resetpassword(Request $request, User $user)
    {
        $user->update([
            'password' => bcrypt('123456'),
        ]);
        return redirect ('user/'.$user->id.'/profile')->with('sukses', 'Password telah direset');
    }
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect ('user/daftar')->with('sukses', 'Data terhapus');
    }
}
