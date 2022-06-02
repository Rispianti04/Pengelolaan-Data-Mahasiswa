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
                                <div class="form-group">
                                    <label>Pilih Laporan</label>
                                    <select name="dropdown" class="form-control">
                                        <option >--Pilih--</option>
                                        <option value="1">Laporan Mahasiswa</option>
                                        <option value="2">Laporan Mahasiswa Asing</option>
                                        <option value="3">Laporan Akumulasi Data Mahasiswa</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            


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
