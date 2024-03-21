<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('pages.login');
    }

    function login(Request $request)
    {
        $request -> validate([
            'email' => 'required|',
            'password' => 'required'
        ],[
            'email.required' => 'Silahkan Masukan Email Anda!',
            'password.required' => 'Silahkan Masukan Password Anda!'
        ]);

        $infoLogin = [
            'email' => $request -> email,
            'password' => $request -> password
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'ssi') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'bfi') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'big') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'mas') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'pjn') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'sps') {
                return redirect('/dashboard');
            } 
        } else {
            return redirect('')->withErrors('Email & Password Anda Tidak Valid!')->withInput();
        }
    }

    function logout(){
        {
            Auth::logout();
            return redirect('');
        }
    }
}
