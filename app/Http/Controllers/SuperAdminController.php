<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\penilaian;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Akumulasi;

use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class SuperAdminController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function kelola_mhs_asli()
    {
        $penilaian = Penilaian::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();
        return view('kelola_mhs_asli', compact('mahasiswa', 'jurusan', 'penilaian'));
    }
    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.jurusan.index', compact('jurusan'));
    }

    public function superadmin()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.mahasiswa.create', compact('jurusan'));
    }

    public function store_mahasiswa(Request $request)
    {



        $request->validate([
            'name_mhs'   => 'required',
            'npm_mhs'   => 'required|unique:mahasiswa',
            'id_jurusan' => 'required',
            'id_penilaian' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',

        ]);
        $penilaian = DB::table('seleksi_mahasiswa')->select('tahun_akademik')->where('id_penilaian', $request->id_penilaian)->first();
        $date = Carbon::now()->format('Y');
        $thn = $penilaian->tahun_akademik;

        DB::table('mahasiswa')->insert([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        if ($request->kelas == 'reg') {
            if ($thn == $date) {
                Penilaian::where('id_penilaian', $request->id_penilaian)
                    ->update([
                        'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler+1'),
                        'jml_calon_mhs_baru_reguler' => DB::raw('jml_calon_mhs_baru_reguler+1'),
                        'jml_calon_mhs_seleksi' => DB::raw('jml_calon_mhs_seleksi+1')
                    ]);
            } else {
                Penilaian::where('id_penilaian', $request->id_penilaian)
                    ->update([
                        'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler+1'),
                    ]);
            }
        } else {
            if ($thn == $date) {
                Penilaian::where('id_penilaian', $request->id_penilaian)
                    ->update([
                        'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer+1'),
                        'jml_calon_mhs_baru_transfer' => DB::raw('jml_calon_mhs_baru_transfer+1'),
                        'jml_calon_mhs_seleksi' => DB::raw('jml_calon_mhs_seleksi+1')
                    ]);
            } else {
                Penilaian::where('id_penilaian', $request->id_penilaian)
                    ->update([
                        'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer+1'),
                    ]);
            }
        }
        $isExist = Akumulasi::select("*")
            ->where("tahun_akademik", $thn)
            ->doesntExist();
        if ($isExist) {
            DB::table('akumulasi')->insert([
                'tahun_akademik' => $thn,
                'jml_calon_mhs_baru_reguler' => '1',
                'jml_calon_mhs_baru_transfer' => '1',
                'jml_calon_mhs_aktif_reguler' => '1',
                'jml_calon_mhs_aktif_transfer' => '1',
                'jml_mhs_asing_full' => '0',
                'jml_mhs_asing_part' => '0'
            ]);
        } else {
            $akumulasi = DB::table('akumulasi')->select('id_akumulasi')->where('tahun_akademik', $thn)->first();
            DB::table('akumulasi')->where('id_akumulasi', $akumulasi->id_akumulasi)->update([
                'jml_calon_mhs_baru_reguler' => DB::raw('jml_calon_mhs_baru_reguler+1'),
                'jml_calon_mhs_baru_transfer' => DB::raw('jml_calon_mhs_baru_transfer+1'),
                'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler+1'),
                'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer+1'),
            ]);
        }




        return redirect()->route('SuperAdmin/kelola_mhs_asli')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $admin = Mahasiswa::find($id);
        $jurusan = Jurusan::all();
        return view('superadmin.mahasiswa.edit', compact('superadmin', 'jurusan'));
    }
    public function update(Request $request, $id)
    {
        // return $request;
        DB::table('mahasiswa')->where('id', $id)->update([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('SuperAdmin/kelola_mhs_asli')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $mahasiswa = DB::table('mahasiswa')->select('id_penilaian')->where('id', $id)->first();
        $idPen = $mahasiswa->id_penilaian;
        $penilaian = DB::table('seleksi_mahasiswa')->select('tahun_akademik')->where('id_penilaian', $idPen)->first();
        $request = DB::table('mahasiswa')->select('kelas')->where('id', $id)->first();
        $date = Carbon::now()->format('Y');
        $thn = $penilaian->tahun_akademik;
        $tahun = explode("/", $thn);
        if ($request->kelas == 'reg') {
            if ($tahun == $date) {
                Penilaian::where('id_penilaian', $idPen)
                    ->update([
                        'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler-1'),
                        'jml_calon_mhs_baru_reguler' => DB::raw('jml_calon_mhs_baru_reguler-1'),
                        'jml_calon_mhs_seleksi' => DB::raw('jml_calon_mhs_seleksi-1')
                    ]);
            } else {
                Penilaian::where('id_penilaian', $idPen)
                    ->update([
                        'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler-1'),
                    ]);
            }
        } else {
            if ($tahun == $date) {
                Penilaian::where('id_penilaian', $idPen)
                    ->update([
                        'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer-1'),
                        'jml_calon_mhs_baru_transfer' => DB::raw('jml_calon_mhs_baru_transfer-1'),
                        'jml_calon_mhs_seleksi' => DB::raw('jml_calon_mhs_seleksi-1')
                    ]);
            } else {
                Penilaian::where('id_penilaian', $idPen)
                    ->update([
                        'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer-1'),
                    ]);
            }
        }
        $admin = Mahasiswa::find($id);
        $admin->delete();
        return redirect()->route('SuperAdmin/kelola_mhs_asli')->with('success', 'Data berhasil dihapus');
    }
    public function nilai()
    {
        $penilaian = Penilaian::all();
        $pendaftar = DB::table('seleksi_mahasiswa')
            ->avg('jml_calon_mhs_pendaftar');
        $jmlseleksi = DB::table('seleksi_mahasiswa')->avg('jml_calon_mhs_seleksi');
        $jmlaktif = DB::table('seleksi_mahasiswa')->avg('jml_calon_mhs_aktif_reguler');
        $jmlaktif_transfer = DB::table('seleksi_mahasiswa')->avg('jml_calon_mhs_aktif_transfer');
        $jmlbaru = DB::table('seleksi_mahasiswa')->avg('jml_calon_mhs_baru_reguler');
        $jmlbaru_transfer = DB::table('seleksi_mahasiswa')->avg('jml_calon_mhs_baru_transfer');
        $jmlmhsaktif = $jmlaktif + $jmlaktif_transfer;
        return view('superadmin.penilaian.index', compact('penilaian', 'pendaftar', 'jmlseleksi', 'jmlmhsaktif', 'jmlbaru', 'jmlbaru_transfer'));
    }
    public function store_nilai(Request $request)
    {
        $request->validate([
            'daya_tampung'   => 'required',
            'tahun_akademik'   => 'required|unique:seleksi_mahasiswa',
            'jml_calon_mhs_pendaftar'   => 'required',
        ]);
        // $mahasiswa = Mahasiswa::where('tahun_masuk', $request->tahun_masuk)->get();

        if ($request->daya_tampung >= $request->jml_calon_mhs_pendaftar) {
            DB::table('seleksi_mahasiswa')->insert([
                'id_penilaian' => $request->id_penilaian,
                'tahun_akademik' => $request->tahun_akademik,
                'jml_calon_mhs_pendaftar' => $request->jml_calon_mhs_pendaftar,
                'jml_calon_mhs_seleksi' => '0',
                'jml_calon_mhs_baru_reguler' => '0',
                'jml_calon_mhs_baru_transfer' => '0',
                'jml_calon_mhs_aktif_reguler' => '0',
                'jml_calon_mhs_aktif_transfer' => '0',
                'daya_tampung' => $request->daya_tampung,
            ]);
            return redirect()->route('SuperAdmin/nilai')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('SuperAdmin/nilai')->with('error', 'Pendaftar tidak melebihi daya tampung');
        }
    }
    public function print_mahasiswa()
    {
    }
}
