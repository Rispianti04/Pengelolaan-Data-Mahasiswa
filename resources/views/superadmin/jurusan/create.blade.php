@extends('layouts.app')
@section('title','Pengelolaan Data Mahasiswa Asing')
@section('content_header')
<h1 class="m-0 text-dark text-center">Data Program Studi</h1>
<section class="content-header">
    
</section>
<section class="content">
    <div class="container-fluid">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
        <div class="row">
            <!-- left column -->
            <div class="col-12">
                <div class="card card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Program Studi</h3>
                    </div>
                    {{-- @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif --}}
                <form action="{{ url('/jurusan/store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <div class="form-group">
                                    <label for="nama_jurusan">Program Studi</label>
                                    <input id="nama_jurusan" name="nama_jurusan" type="text"
                                        class="@error('nama_jurusan') is-invalid @enderror form-control"
                                        placeholder="Nama Program Studi" value="{{ old('nama_jurusan') }}">
                                    @error('nama_jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@section('script')
@yield('DT')
@endsection
@stop
