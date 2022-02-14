<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    { 
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $admin = Admin::where('email', $email)->where('password', $password)->firstOrFail();
            if ($admin->role == 1) {
            $request->session()->put('id', $admin->idAdmin);
            $request->session()->put('name', $admin->nameAdmin);
            $request->session()->put('username', $admin->username);
            $request->session()->put('password', $admin->password);
            $request->session()->put('email', $admin->email);
            $request->session()->put('phone', $admin->phone);
            $request->session()->put('dateBirth', $admin->dateBirth);
            $request->session()->put('gender', $admin->gender);
            $request->session()->put('role', $admin->role);
            return Redirect::route('dashboard');
        }else if($admin->role == 0){
            $request->session()->put('id1', $admin->idAdmin);
            $request->session()->put('name1', $admin->nameAdmin);
            $request->session()->put('username1', $admin->username);
            $request->session()->put('password1', $admin->password);
            $request->session()->put('email1', $admin->email);
            $request->session()->put('phone1', $admin->phone);
            $request->session()->put('dateBirth1', $admin->dateBirth);
            $request->session()->put('gender1', $admin->gender);
            $request->session()->put('role1', $admin->role);
                return Redirect::route('dashboard');
        }
    } catch (Exception $e) {
        return Redirect::route('login')->with('error', 'Tài khoản hoặc mật khẩu không đúng ');
    }
}

    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('login');
    }
}