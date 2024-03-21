@extends('layouts.master')
@section('title', 'SFM - Master Area')
@section('master-area', 'active')
@section('master', 'show')
@section('master-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Area</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('master-area') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke Master Area
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('master-area/'.$data -> Kode) }}' method='post'>
                @csrf
                @method('PUT')
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode" id="kode" value="{{ $data -> Kode }}" readonly>
                            {{-- {{ $data -> Kode }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_area" class="col-sm-2 col-form-label">Nama Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_area' id="nama_area" value="{{ $data -> Nama_Area }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='keterangan' id="keterangan" value="{{ $data -> Keterangan }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="button" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-fw fa-check"></i> Update</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection