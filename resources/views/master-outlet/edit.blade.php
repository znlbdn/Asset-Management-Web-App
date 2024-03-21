@extends('layouts.master')
@section('title', 'SFM - Master Outlet')
@section('master-outlet', 'active')
@section('master', 'show')
@section('master-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Outlet</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('master-outlet') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke Master Outlet
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('master-outlet/'.$data -> custid) }}' method='post'>
                @csrf
                @method("PUT")
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="kode_customer" class="col-sm-2 col-form-label">Kode Customer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_customer" id="kode_customer" value="{{ $data -> custid }}" readonly>
                            {{-- {{ $data -> custid }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_customer" class="col-sm-2 col-form-label">Nama Customer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_customer" id="nama_customer" value="{{ $data -> custname }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10">
                            <select name="tipe" id="tipe" class="form-control" required>
                                <option value="{{ $data -> Tipe }}">{{ $data -> Tipe }}</option>
                                <option value="Outlet">Outlet</option>
                                <option value="Gudang">Gudang</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='alamat' id="alamat" value="{{ $data -> address }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='latitude' id="latitude" value="{{ $data -> latitude }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='longitude' id="longitude" value="{{ $data -> longitude }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control" required>
                                <option value="{{ $data -> status }}">{{ $data -> status }}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-fw fa-check"></i> Update</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection