<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login.login');
    }

    public function register()
    {
        return view('login.register');
    }

    public function proslog(Request $request)
    {
        $rules = [
        'username'              => 'required|string',
        'password'              => 'required|string'
    ];

    $messages = [
        'username.required'     => 'Email wajib diisi',
        'password.required'     => 'Password wajib diisi',
        'password.string'       => 'Password harus berupa string'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput($request->all);
    }

    $data = [
        'username'     => $request->input('username'),
        'password'  => $request->input('password'),
    ];

    Auth::attempt($data);

    if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
        //Login Success
        return redirect()->route('home');

    } else { // false

        //Login Fail
        Session::flash('error', 'username atau password salah');
        return redirect()->route('login');
    }
    }

    public function prosreg(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'username'              => 'required|min:5|max:35',
            'password'              => 'required|confirmed',
            'hp'                    => 'required|min:10|max:13',
            'lahir'                 => 'required',
            'jk'                    => 'required',
            'alamat'                => 'required',
            'role'                  => 'required'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'username.required'     => 'Email wajib diisi',
            'username.min'          => 'Nama lengkap minimal 5 karakter',
            'username.max'          => 'Nama lengkap maksimal 35 karakter',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'jk.required'           => 'Jenis Kelamin wajib diisi',
            'lahir.required'        => 'Tanggal lahir wajib diisi',
            'hp.required'           => 'No.HP wajib diisi',
            'alamat.required'       => 'Alamat wajib diisi',
            'role.required'       => 'Tentukan rolenya'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User();
        $user->name = ucwords(strtolower($request->name));
        $user->username = strtolower($request->username);
        $user->password = Hash::make($request->password);
        $user->lahir = $request->lahir;
        $user->jk = strtolower($request->jk);
        $user->alamat = $request->alamat;
        $user->hp = strtolower($request->hp);
        $user->role = strtolower($request->role);


        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
