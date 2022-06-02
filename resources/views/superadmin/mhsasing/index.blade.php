@extends('layouts.app')
@section('title', 'Pengelolaan Data Mahasiswa Asing')
@section('content_header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="m-0 text-dark text-center">Data Mahasiswa Asing</h1>
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
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>NPM</th>
                                            <th>PROGRAM STUDI</th>
                                            <th>TAHUN MASUK</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $siswa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $siswa->name_mhs }}</td>
                                                <td>{{ $siswa->npm_mhs }}</td>
                                                <td>{{ $siswa->jurusan->nama_jurusan }}</td>
                                                <td>{{ $siswa->penilaian2->tahun_akademik}}</td>
                                                <td>

                                                    <a href="#" data-toggle="modal"
                                                        data-target="#Details{{ $siswa->id }}"
                                                        class="btn btn-primary btn-sm Edit">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#Edit{{ $siswa->id }}"
                                                        class="btn btn-warning btn-sm Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="#" data-toggle="modal" data-target="#delete{{ $siswa->id }}"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        
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
        @include('superadmin.mhsasing.create')
        @include('superadmin.mhsasing.edit')
        @include('superadmin.mhsasing.delete')
        @include('superadmin.mhsasing.details')
        </div>




    </section>
@section('script')



@endsection


@stop
