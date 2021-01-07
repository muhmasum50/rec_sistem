<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Exception;
use Validator;
use Hash;
use Session;
use App\User;

class AuthController extends Controller
{
    public function googleLinkLogin() {
        if (Auth::check()) { 
            return redirect('home');
        }
        return Socialite::driver('google')->redirect();
    }

    public function GoogleLogin() {
        try {
    
            $google = Socialite::driver('google')->user();  
            $user = User::where('email', $google->email)->first();
     
            if($user){
                
                $data = [
                    'username'  => $user->username,
                    'password'  => $user->hint,
                ];
                Auth::attempt($data);

                if (Auth::check()) {
                    session([
                        'akses_role' => $user->role,
                        'email' => $user->email,
                        'auth' => true
                    ]);
                    return redirect('home');
         
                } 
     
            }
            else{
                $newUser = User::create([
                    'username' => $google->id,
                    'password' => Hash::make($google->id),
                    'email' => $google->email,
                    'name' => $google->name,
                    'hint' => $google->id,
                    'remember_token' => $google->token,
                    'role' => 'user',
                    'avatar' => $google->avatar    
                ]);
                
                Auth::login($newUser);
                return redirect('home');
            }
    
        } catch (Exception $e) {
            abort(404);
        }
    }

    public function index() {
        if (Auth::check()) { 
            return redirect('home');
        }
        return view('auth.v_login');
    }

    public function login(Request $request){
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
 
        $messages = [
            'username.required'  => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) {
            $user = User::where('username', $request->username)->first();
            session([
                'akses_role' => $user->role,
                'email' => $user->email,
                'auth' => true
            ]);
            return redirect('home');
 
        } 
        else { 
            Session::flash('error', 'Email atau password salah');
            return redirect('login');
        }
 
    } 

    public function daftar() {
        return view('auth.v_register');
    }

    public function prosesdaftar(Request $request) {
        $rules = [
            'username' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ];
 
        $messages = [
            'username.required'  => 'Username wajib diisi',
            'username.string'  => 'Username berupa string',
            'password.required' => 'Password wajib diisi',
            'name.required'  => 'Nama wajib diisi',
            'name.string'  => 'Nama berupa string',
            'email.required'  => 'Email wajib diisi',
            'nama.email'  => 'Email tidak valid',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data= [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'name' => $request->name,
            'hint' => $request->password,
            'role' => 'user'
        ];

        $user = User::insert($data);
        if($user == true) {
            Session::flash('success', 'Berhasil mendaftarkan akun, silahkan login');
            return redirect('login');
        }
        else {
            Session::flash('error', 'Gagal Mendaftarkan akun');
            return redirect('daftar');
        }


    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('login');
    }

    public function default() {
        return redirect('login');
    }
}

