<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Tamu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.login');

    }
    public function register()
    {
        $user = DB::table('user')->get();
        return view('login.register', ['user' => $user]);

    }
    public function registerUser(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:user',
            'telepon' => 'required',
            'password' => 'required|min:6|max:255'

        ]);

        $validate['password'] = bcrypt($validate['password']);
        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success',' User berhasil ditambahkan dan silahkan login');
        } else {
            return back()->with('fail',' Terdapat kesalahan saat memasukan data');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('users')->with('success','Berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('users')->with('success',' Penghapusan berhasil.');
    }

    public function loginUser(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
                if ($user->level == 'Admin') {
                    return redirect()->intended('/home');
                } elseif ($user->level == "User") {
                    return redirect()->intended('/dashboard');
                }
                return redirect()->intended('/');
        }

        return back()->with('fail', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

