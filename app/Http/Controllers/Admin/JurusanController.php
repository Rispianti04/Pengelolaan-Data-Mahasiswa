<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades;
use DB;
use Illuminate\Http\Request;
// use App\Http\Controllers\Admin\JurusanController;
// use App\Http\Controllers\Controller\Admin\JurusanController;


class JurusanController extends Controller
{
    public function create()
    {
        return view('superadmin.jurusan.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama_jurusan'   => 'required|unique:jurusan',

        ]);
        DB::table('jurusan')->insert([
            'nama_jurusan' => $request->nama_jurusan,
        ]);
        return redirect()->route('SuperAdmin/jurusan')->with('success', 'Data berhasil ditambahkan');
    }
    public function delete($id)
    {

        $admin = Jurusan::find($id);
        $admin->delete();
        return redirect()->route('SuperAdmin/jurusan/delete')->with('success', 'Data berhasil dihapus');
    }
    public function edit($id)
    {
        $admin = Jurusan::find($id);
        $admin->edit();
        return view('superadmin.jurusan.edit', compact('superadmin', 'jurusan'));
    }
}
