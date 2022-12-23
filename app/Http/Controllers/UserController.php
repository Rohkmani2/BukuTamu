<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Tamu;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $tamu = DB::table('tamu')->get();
        return view('dashboard.main', ['tamu'=> $tamu]);

    }

    public function users()
    {
        $user = DB::table('user')->get();
        return view('users.user', ['user'=> $user]);
    }

    public function ubah(Request $request, $id)
    {
       if($request->isMethod('post')){
        $user = $request->all();
       }
    }
}
