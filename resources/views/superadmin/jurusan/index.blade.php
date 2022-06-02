@extends('layouts.app')
@section('title','Pengelolaan Data Mahasiswa Asing')
@section('content_header')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<h1 class="m-0 text-dark text-center">Pengelolaan Data Jurusan</h1>
<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
        </div>
        
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
                                <h3 class="card-title">Program Studi</h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right">
                                    <a href="{{ url('/jurusan/create') }}" class="btn btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Program Studi</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jurusan as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->nama_jurusan }}</td>
                                        <td>
                                            <a href="{{ url('/edit_mhs_asing/'.$siswa->id_jurusan) }}" class="btn btn-warning"> <i class="fas fa-edit"></i></a>
                                            <a href="{{ url('/SuperAdmin/jurusan/delete'.$siswa->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                   </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
</section>
@section('script')
@yield('DT')
@endsection
@stop
