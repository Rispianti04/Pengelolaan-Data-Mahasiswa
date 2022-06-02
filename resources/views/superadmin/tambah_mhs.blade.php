@extends('layouts.app')
@section('title','Pengelolaan Data Mahasiswa Asing')
@section('content_header')
<h1 class="m-0 text-dark text-center">Data Mahasiswa Asli </h1>
<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <h1>Simple Tables</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </div>
    </div>
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
                    <h3 class="card-title">Tambah Data Mahasiswa</h3>
                </div>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{ url('store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <div class="form-group">
                                    <label for="name_mhs">Nama Mahasiswa</label>
                                    <input id="name_mhs" name="name_mhs" type="text"
                                        class="@error('name_mhs') is-invalid @enderror form-control"
                                        placeholder="Nama Mahasiswa" value="{{ old('name_mhs') }}">
                                    @error('name_mhs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="npm_mhs">NPM Mahasiwa</label>
                                    <input id="npm_mhs" name="npm_mhs" type="text"
                                        class="@error('npm_mhs') is-invalid @enderror form-control"
                                        placeholder="NPM Mahasiswa" value="{{ old('npm_mhs') }}">
                                    @error('npm_mhs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_jurusan">Jurusan</label>
                                    <select name="id_jurusan" id="id_jurusan"
                                        class="@error('id_jurusan') is-invalid @enderror form-control">
                                        <option value="">Pilih Jurusan</option>
                                        @foreach ($jurusan as $jurusan)
                                        <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    {{-- <div class="form-group">
                                        <label>Jurusan</label>
                                        <select name="id_jurusan"  class="form-control select2" style="width: 100%;" >
                                            <option selected="selected">Pilih Jurusan</option>
                                            @foreach ($jurusan as $j)
                                            <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                    @endforeach
                                    </select>

                                </div> --}}
                                <div class="form-group">
                                    <label for="tahun_masuk">Tahun Masuk</label>
                                    <input id="tahun_masuk" name="tahun_masuk" type="number"
                                        class="@error('tahun_masuk') is-invalid @enderror form-control"
                                        placeholder="Tahun Masuk" value="{{ old('tahun_masuk') }}">
                                    @error('tahun_masuk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                   
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
