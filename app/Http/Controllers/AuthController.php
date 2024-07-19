<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('auth.login');
    }

    public function login_proces(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        $admin = DB::table('user')
                        ->where('username',$credentials['username'])
                        ->first();


        if ($admin && password_verify($credentials['password'], $admin->password)) {
            Session::put('admin', 'admin 1');
            Session::put('role', 'super admin');
            Session::put('tahun', date('Y'));
            Session::put('is_authenticated', true);
            return redirect()->intended('admin');
            echo 'login sukses';
        } else {
            // Authentication failed
            return back()->withErrors(['errors' => 'Username atau Password Salah']);
            // echo 'login gagal';
        }
    }

    public function logout()
    {        
        // Flush session data
        session()->flush();
        // Redirect to the root URL after logging out
        return Redirect::to('auth/login')->with('success', 'Logged out successfully');

    }
}
