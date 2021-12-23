<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        return view('back.auth.login');
    }

    public function loginPost(Request $request){
        $data =  $request->only('name', 'password');
       if(Auth::attempt($data)){
           toastSuccess('Tekrar Hosşeldin '.Auth::user()->name,'Giriş Başarılı');
           return redirect()->route('homepage');

       }
       else{
           return redirect()->route('login')->withErrors('Yanlış bir şeyler varr!!');
       }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }








}
