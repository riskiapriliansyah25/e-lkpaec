<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }
    public function user()
    {
        return view('e-learning.login');
    }
    public function userlogin(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            if(auth()->user()->role == 'admin')
            {
                return redirect('admin');
            }else if(auth()->user()->role == 'instruktur'){
                return redirect('user');
            }else if(auth()->user()->role == 'pimpinan'){
                return redirect('pimpinan');
            }else{
                return redirect('e-learning');
            }
            }else{
                return redirect('e-learning/login')->with('gagal', 'Username atau password salah');
            }
 
    }
    public function postlogin(Request $request)
   {
       if(Auth::attempt($request->only('username','password'))){
           if(auth()->user()->role == 'admin')
           {
               return redirect('admin');
           }else if(auth()->user()->role == 'pimpinan'){
               return redirect('pimpinan');
           }else if(auth()->user()->role == 'instruktur'){
               return redirect('user');
           }else{
               return redirect('e-learning');
           }
           }

           return redirect('login')->with('gagal', 'Username atau password salah');;
    }
   public function logout()
   {
       Auth::logout();
       return redirect('login');
   }
   public function _logout()
   {
       Auth::logout();
       return redirect('e-learning/login');
   }
    public function register()
    {
        return view('auth.register');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
