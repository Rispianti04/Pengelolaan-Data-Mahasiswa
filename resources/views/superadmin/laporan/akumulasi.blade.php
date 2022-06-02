@extends('layouts.app')
@section('title', 'Pengelolaan Data Akumulasi')
@section('content_header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="m-0 text-dark text-center">Data Akumulasi</h1>
    <section class="content-header">
        <div class="row">
            {{-- <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Simple Tables</li>
                 </ol>
             </div> --}}
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form action="{{ url('Laporan/laporan') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Pilih Laporan</label>
                                            <select name="dropdown" class="form-control">
                                                <option>--Pilih--</option>
                                                <option value="1">Laporan Mahasiswa</option>
                                                <option value="2">Laporan Mahasiswa Asing</option>
                                                <option value="3">Laporan Akumulasi Data Mahasiswa</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-right">
                                        <a href="{{ route('Laporan/cetak_akumulasi') }}" class="btn btn-primary">Cetak
                                            PDF</a>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Tahuan Akademik</th>
                                            <th colspan="2" class="text-center">Jumlah <br>Mahasiswa baru</th>
                                            <th colspan="2" class="text-center">Jumlah <br>Mahasiswa Aktif</th>
                                            <th colspan="2" class="text-center">Jumlah <br>Mahasiswa Asing</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Reguler</th>
                                            <th class="text-center">Transfer</th>
                                            <th class="text-center">Reguler</th>
                                            <th class="text-center">Transfer</th>
                                            <th class="text-center">Pindahan</th>
                                            <th class="text-center">MBKM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penilaian as $nilai)
                                            <tr>
                                                <td>{{ $nilai->tahun_akademik }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_baru_reguler }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_baru_transfer }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_aktif_reguler }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_aktif_transfer }}</td>
                                                <td>{{ $nilai->jml_mhs_asing_full }}</td>
                                                <td>{{ $nilai->jml_mhs_asing_part }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th colspan="6">Total Mahasiswa</th>
                                            <th>{{ $totalmhs }}</th>
                                </tr>
                                </tfoot> --}}

                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <!-- /.container-fluid -->
        {{-- @include('superadmin.laporan.dropdown') --}}
        {{-- @include('superadmin.mhsasing.create')
             @include('superadmin.mhsasing.edit')
             @include('superadmin.mhsasing.delete')
             @include('superadmin.mhsasing.details') --}}
        </div>




    </section>
@section('script')



@endsection


@stop
