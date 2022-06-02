<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades;
use DB;
use Illuminate\Http\Request;
use App\Models\Mhsasing;
use App\Models\Akumulasi;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\penilaian2;
use Carbon\Carbon;


class MahasiswaController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function kelola_mhs_asing()
    {
        $penilaian2 = penilaian2::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mhsasing::all();
        return view('superadmin/mhsasing/index', compact('mahasiswa', 'jurusan', 'penilaian2'));
    }
    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.jurusan.index', compact('jurusan'));
    }
    public function superadmin()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.mhsasing.create', compact('jurusan'));
    }
    public function store_asing(Request $request)
    {

        $request->validate([
            'name_mhs'   => 'required',
            'npm_mhs'   => 'required|unique:mahasiswa_asing',
            'id_jurusan' => 'required',
            'id_penilaian' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'keterangan' => 'required',
            'nama_univ' => 'required',

        ]);
        $penilaian = DB::table('seleksi_mahasiswa2')->where('id_penilaian', $request->id_penilaian)->first();
        $jurusan = DB::table('jurusan')->where('id_jurusan', $request->id_jurusan)->first();
        DB::table('mahasiswa_asing')->insert([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keterangan' => $request->keterangan,
            'nama_univ' => $request->nama_univ,
        ]);
        if ($request->kelas == 'reg') {
            if ($penilaian->prodi == '') {
                penilaian2::where('id_penilaian', $request->id_penilaian)
                ->update([
                    'prodi' => $jurusan->nama_jurusan,
                    'jml_mhs_asing_aktif' => DB::raw('jml_mhs_asing_aktif+1'),
                    'jml_mhs_asing_full' => DB::raw('jml_mhs_asing_full+1')
                ]);
            }else{
                penilaian2::where('id_penilaian', $request->id_penilaian)
                ->update([
                    'jml_mhs_asing_aktif' => DB::raw('jml_mhs_asing_aktif+1'),
                    'jml_mhs_asing_full' => DB::raw('jml_mhs_asing_full+1')
                ]);
            }
        } else {
            if ($penilaian->prodi == '') {
                penilaian2::where('id_penilaian', $request->id_penilaian)
                ->update([
                    'prodi' => $jurusan->nama_jurusan,
                    'jml_mhs_asing_aktif' => DB::raw('jml_mhs_asing_aktif+1'),
                    'jml_mhs_asing_part' => DB::raw('jml_mhs_asing_part+1')
                ]);
            } else {
                penilaian2::where('id_penilaian', $request->id_penilaian)
                ->update([
                    'jml_mhs_asing_aktif' => DB::raw('jml_mhs_asing_aktif+1'),
                    'jml_mhs_asing_part' => DB::raw('jml_mhs_asing_part+1')
                ]);
            }
            
        }
        $isExist = Akumulasi::select("*")
            ->where("tahun_akademik", )
            ->doesntExist();

        if ($isExist) {
            if ($request->keterangan == 'pindahan') {
                DB::table('akumulasi')->insert([
                    'tahun_akademik' => $penilaian->tahun_akademik,
                    'jml_calon_mhs_baru_reguler' => '0',
                    'jml_calon_mhs_baru_transfer' => '0',
                    'jml_calon_mhs_aktif_reguler' => '0',
                    'jml_calon_mhs_aktif_transfer' => '0',
                    'jml_mhs_asing_full' => '1',
                    'jml_mhs_asing_part' => '0'
                ]);
            } else {
                DB::table('akumulasi')->insert([
                    'tahun_akademik' => $penilaian->tahun_akademik,
                    'jml_calon_mhs_baru_reguler' => '0',
                    'jml_calon_mhs_baru_transfer' => '0',
                    'jml_calon_mhs_aktif_reguler' => '0',
                    'jml_calon_mhs_aktif_transfer' => '0',
                    'jml_mhs_asing_full' => '0',
                    'jml_mhs_asing_part' => '1'
                ]);
            }
        } else {
            $akumulasi = DB::table('akumulasi')->select('id_akumulasi')->where('tahun_akademik', $thn)->first();
            if ($request->keterangan == 'pindahan') {
                DB::table('akumulasi')->where('id_akumulasi', $akumulasi->id_akumulasi)->update([
                    'jml_mhs_asing_full' => DB::raw('jml_mhs_asing_full+1'),
                ]);
            } else {
                DB::table('akumulasi')->where('id_akumulasi', $akumulasi->id_akumulasi)->update([
                    'jml_mhs_asing_part' => DB::raw('jml_mhs_asing_part+1'),
                ]);
            }
        }
        return redirect()->route('Mahasiswa/index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $admin = Mhsasing::find($id);
        $jurusan = Jurusan::all();
        return view('superadmin.mhsasing.edit', compact('superadmin', 'jurusan'));
    }
    public function update(Request $request, $id)
    {
        // return $request;
        DB::table('mahasiswa_asing')->where('id', $id)->update([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keterangan' => $request->keterangan,
            'nama_univ' => $request->nama_univ,
        ]);

        return redirect()->route('Mahasiswa/index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {

        $admin = Mhsasing::find($id);
        $admin->delete();
        return redirect()->route('Mahasiswa/delete')->with('success', 'Data berhasil dihapus');
    }
    public function nilai2()
    {
        $penilaian2 = penilaian2::all();
        return view('superadmin/penilaian2/index', compact('penilaian2'));
    }
    public function store_nilai2(Request $request)
    {

        $request->validate([
            'tahun_akademik'   => 'required|unique:seleksi_mahasiswa2',
        ]);

        // $mahasiswa = Mahasiswa::where('tahun_masuk', $request->tahun_masuk)->get();

        if ($request->daya_tampung >= $request->jml_calon_mhs_pendaftar) {
            DB::table('seleksi_mahasiswa2')->insert([
                'tahun_akademik' => $request->tahun_akademik,
                'prodi' => '',
                'jml_mhs_asing_aktif' => '0',
                'jml_mhs_asing_full' => '0',
                'jml_mhs_asing_part' => '0',
            ]);
            return redirect()->route('Mahasiswa/nilai2')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->route('Mahasiswa/nilai2')->with('success', 'Data tidak berhasil ditambahkan');
    }
}
