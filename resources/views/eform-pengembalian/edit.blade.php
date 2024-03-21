@extends('layouts.master')
@section('title', 'SFM - E-form Pengembalian')
@section('eform-pengembalian', 'active')
@section('eform', 'show')
@section('eform-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengembalian Freezer</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('eform-pengembalian') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke E-form Pengembalian
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('eform-pengembalian/'.$data -> ret_no) }}' method='post'>
                @csrf
                @method("PUT")
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="ret_no" class="col-sm-2 col-form-label">Nomor Pengembalian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ret_no" id="ret_no" value="{{ $data -> ret_no }}" readonly>
                            {{-- {{ $data -> ret_no }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ret_date" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="ret_date" id="ret_date" value="{{ $data -> ret_date }}" readonly>
                            {{-- {{ $data -> ret_date }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ret_kode" class="col-sm-2 col-form-label">Kode Freezer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='ret_kode' id="ret_kode" value="{{ $data -> ret_kode }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ret_back" class="col-sm-2 col-form-label">Tujuan Pengembalian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='ret_back' id="ret_back" value="{{ $data -> ret_kode }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ret_type" class="col-sm-2 col-form-label">Type Freezer</label>
                        <div class="col-sm-10">
                            <select name="ret_type" id="ret_type" class="form-control" required>
                                <option value="{{ $data -> ret_type }}">{{ $data -> ret_type }}</option>
                                <option value="CARAVEL">CARAVEL</option>
                                <option value="CRS">CRS</option>
                                <option value="FIGOREX">FIGOREX</option>
                                <option value="FUJISEI">FUJISEI</option>
                                <option value="FRESTA">FRESTA</option>
                                <option value="FRIGOSTAR">FRIGOSTAR</option>
                                <option value="GEA">GEA</option>
                                <option value="ICM">ICM</option>
                                <option value="KLIMASAN">KLIMASAN</option>
                                <option value="MITSUBISHI">MITSUBISHI</option>
                                <option value="SANDEN INTERCOOL">SANDEN INTERCOOL</option>
                                <option value="SANWO">SANWO</option>
                                <option value="RSA">RSA</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ret_size" class="col-sm-2 col-form-label">Ukuran Frezer</label>
                        <div class="col-sm-10">
                            <select name="ret_size" id="ret_size" class="form-control" required>
                                <option value="{{ $data -> ret_size }}">{{ $data -> ret_size }}</option>
                                <option value="100 L">100 L</option>
                                <option value="200 L">200 L</option>
                                <option value="250 L">250 L</option>
                                <option value="300 L">300 L</option>
                                <option value="400 L">400 L</option>
                                <option value="500 L">500 L</option>
                                <option value="600 L">600 L</option>
                                <option value="650 L">650 L</option>
                                <option value="700 L">700 L</option>
                                <option value="750 L">750 L</option>
                                <option value="800 L">800 L</option>
                                <option value="850 L">850 L</option>
                                <option value="900 L">900 L</option>
                                <option value="950 L">950 L</option>
                                <option value="1000 L">1000 L</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="submit" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-fw fa-check"></i> Update</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection