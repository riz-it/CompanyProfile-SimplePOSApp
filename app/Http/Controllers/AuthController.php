<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
   public function index()
   {
       return view('login');
   }

   public function verified_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $kredensil = $request->only('username', 'password');

        $userInfo = User::where('username', '=', $request->username)->first();

        if (!$userInfo) {
            return back()->with('fail', 'Username not found');
        } else {

            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                if (Auth::attempt($kredensil)) {
                    $user = Auth::user();
                    return redirect()->intended('dashboard')->with('success', 'Berhasil login');
                } else {
                    return redirect('/login');
                }
            } else {
                return back()->with('fail', 'Password incorrect');
            }
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login')->with('success', 'Success logout');
    }
}
