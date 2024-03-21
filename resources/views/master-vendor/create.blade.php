@extends('layouts.master')
@section('title', 'SFM - Master Vendor')
@section('master-vendor', 'active')
@section('master', 'show')
@section('master-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Vendor</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('master-vendor') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke Master Vendor
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('master-vendor') }}' method='post'>
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="kode_vendor" class="col-sm-2 col-form-label">Kode Vendor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='kode_vendor' id="kode_vendor" value="{{ Session::get('kode_vendor') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_vendor" class="col-sm-2 col-form-label">Nama Vendor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_vendor' id="nama_vendor" value="{{ Session::get('nama_vendor') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="npwp" class="col-sm-2 col-form-label">No NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='npwp' id="npwp" value="{{ Session::get('npwp') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pic" class="col-sm-2 col-form-label">Nama PIC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='pic' id="pic" value="{{ Session::get('pic') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hp" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='hp' id="hp" value="{{ Session::get('hp') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='alamat' id="alamat" value="{{ Session::get('alamat') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="submit" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-fw fa-check"></i> Simpan</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection