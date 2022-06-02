@extends('layouts.app')
@section('title', 'Pengelolaan Data Mahasiswa Asing')
@section('content_header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
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
                                    <h3 class="card-title">Data Mahasiswa Asing</h3>
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
                                            <th rowspan="2">Program Studi</th>
                                            <th class="text-center">Jumlah <br>Mahasiswa Asing <br> Aktif</th>
                                            <th class="text-center">Jumlah <br>Mahasiswa Asing <br> Full Time</th>
                                            <th class="text-center">Jumlah <br>Mahasiswa Asing <br> Part Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penilaian2 as $nilai)
                                            <tr>
                                                <td>{{ $nilai->tahun_akademik }}</td>
                                                <td>{{ $nilai->prodi }}</td>
                                                <td>{{ $nilai->jml_mhs_asing_aktif }}</td>
                                                <td>{{ $nilai->jml_mhs_asing_full }}</td>
                                                <td>{{ $nilai->jml_mhs_asing_part }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>

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
        @include('superadmin.penilaian2.create')
        {{-- @include('superadmin.penilaian.edit')
        @include('superadmin.penilaian.delete')
        @include('superadmin.penilaian.details') --}}
        </div>




    </section>
@section('script')



@endsection


@stop
