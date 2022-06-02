<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Mhsasing;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $mahasiswa = Mahasiswa::count();
        $mhsasing = Mhsasing::count();
        $jurusan = Jurusan::count(); 
        return view('home', compact('mahasiswa','mhsasing','jurusan'));
    }
}
