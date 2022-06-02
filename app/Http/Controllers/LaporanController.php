<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\penilaian;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Akumulasi;
use App\Models\penilaian2;
use PDF;
use DB;
use Dompdf\Dompdf;
use App\Models\Mhsasing;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function laporan()
    {
        $page = 'index';
        return view('superadmin/laporan/index', compact('page'));
    }
    public function mahasiswa()
    {
        $penilaian = Penilaian::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();
        $totalmhs = Mahasiswa::count();
        return view('superadmin/laporan/mahasiswa', compact('penilaian', 'jurusan', 'mahasiswa', 'totalmhs'));
    }
    public function laporan_mahasiswa()
    {
        $penilaian = Penilaian::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();
        $totalmhs = Mahasiswa::count();
        return view('superadmin/laporan/index', compact('mahasiswa', 'jurusan', 'penilaian',));
    }
    public function cetak_pdf()
    {
        $totalmhs = Mahasiswa::count();
        $mahasiswa = Mahasiswa::all();
        $pdf = PDF::loadview('superadmin/laporan/pdfmhs', ['mahasiswa' => $mahasiswa, 'totalmhs' => $totalmhs]);
        return $pdf->download('laporan-mahasiswa.pdf');
    }
    public function mhsasing()
    {
        $mahasiswa = Mhsasing::all();
        $totalmhs = Mhsasing::count();
        return view('superadmin/laporan/mhsasing', compact('mahasiswa', 'totalmhs'));
    }
    public function cetak_asing()
    {
        $mahasiswa = Mhsasing::all();
        $totalmhs = Mhsasing::count();
        $pdf = PDF::loadview('superadmin/laporan/pdfmhsasing', ['mahasiswa' => $mahasiswa, 'totalmhs' => $totalmhs]);
        return $pdf->download('laporan-mahasiswa_asing.pdf');
    }
    public function akumulasi()
    {
        $penilaian = Akumulasi::all();
        return view('superadmin/laporan/akumulasi', compact('penilaian'));
    }
    public function pdf_akumulasi()
    {
        $penilaian = Akumulasi::all();
        $pdf = PDF::loadview('superadmin/laporan/pdfakumulasi', ['penilaian' => $penilaian]);
        return $pdf->download('laporan-akumulasi.pdf');
    }
}
