<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ulasan;
use App\Models\Tamu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $jml_user = User::all()->count();
        $jml_tamu = Tamu::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        return view('index')->with(['jml_tamu' => $jml_tamu, 'jml_ulasan' => $jml_ulasan, 'jml_user' => $jml_user]);
    }
}
