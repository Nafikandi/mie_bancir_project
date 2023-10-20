<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Alert;

class AuthAdminController extends Controller
{

    public function login(){
        return view('pages.admin.auth.login');
    }

    public function logstore(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard.index'));
    }



    public function register(){
        return view('pages.admin.auth.register');
    }

    public function registore(Request $request){

        $request->validate([
            'name' => ['required','string','max:100'],
            'email' => ['required','email','string','max:100','unique:'.User::class],
            'number_phone' => ['required','digits:12','numeric'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pegawairegister = User::create([
            'name' => $request->name,
            'username' => $request->name,
            'password' =>  Hash::make($request->password),
            'email' => $request->email,
            'number_phone' =>$request->number_phone,
            'address' => '',
            'role_id' => $request->role_id
        ]);

        if($pegawairegister){
            Alert::toast('Akun Berhasil Dibuat','success')
            ->autoClose(2000)->position('top-end');
            return redirect()->route('admin.login');
        }
        else{
            Alert::toast('Akun Gagal Dibuat','error')
            ->autoClose(2000)->position('top-end');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
