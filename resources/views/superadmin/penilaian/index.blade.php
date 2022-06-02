@extends('layouts.app')
@section('title', 'Pengelolaan Data Mahasiswa Asing')
@section('content_header')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <h1 class="m-0 text-dark text-center">Penilaian Mahasiswa</h1>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Data Mahasiswa Asli</h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-right">
                                        <a href="#" data-toggle="modal" data-target="#Create" class="btn btn-primary">Tambah
                                            Data</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Tahuan Akademik</th>
                                            <th rowspan="2">Daya Tampung</th>
                                            <th colspan="2" class="text-center">Jumlah <br>Calon Mahasiswa</th>
                                            <th colspan="2" class="text-center">Jumlah <br>Mahasiswa baru</th>
                                            <th colspan="2" class="text-center">Jumlah <br>Mahasisa Aktif</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Pendaftar</th>
                                            <th class="text-center">Lulus Seleksi</th>
                                            <th class="text-center">Reguler</th>
                                            <th class="text-center">Non-Reguler</th>
                                            <th class="text-center">Reguler</th>
                                            <th class="text-center">Non-Reguler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penilaian as $nilai)
                                            <tr>
                                                <td>{{ $nilai->tahun_akademik }}</td>
                                                <td>{{ $nilai->daya_tampung }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_pendaftar }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_seleksi }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_baru_reguler }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_baru_transfer }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_aktif_reguler }}</td>
                                                <td>{{ $nilai->jml_calon_mhs_aktif_transfer }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-center">Jumlah</th>
                                            <th class="text-center">{{ $pendaftar < 1 ? '0' : $pendaftar }}</th>
                                            <th class="text-center">{{ $jmlseleksi < 1 ? '0' : $jmlseleksi }}</th>
                                            <th class="text-center">{{ $jmlbaru < 1 ? '0' : $jmlbaru }}</th>
                                            <th class="text-center">
                                                {{ $jmlbaru_transfer < 1 ? '0' : $jmlbaru_transfer }}</th>
                                            <th colspan="2" class="text-center">
                                                {{ $jmlmhsaktif < 1 ? '0' : $jmlmhsaktif }}</th>
                                        </tr>
                                    </tfoot>

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
        @include('superadmin.penilaian.create')
        {{-- @include('superadmin.penilaian.edit')
        @include('superadmin.penilaian.delete')
        @include('superadmin.penilaian.details') --}}
        </div>




    </section>
@section('script')



@endsection


@stop
