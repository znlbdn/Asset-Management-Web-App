@extends('layouts.master')
@section('title', 'SFM - E-form Permintaan')
@section('eform-permintaan', 'active')
@section('eform', 'show')
@section('eform-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Permintaan Freezer</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('eform-permintaan') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke Permintaan Freezer
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('eform-permintaan/'.$data -> req_no) }}' method='post'>
                @csrf
                @method("PUT")
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="req_no" class="col-sm-2 col-form-label">Nomor Permintaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="req_no" id="req_no" value="{{ $data -> req_no }}" readonly>
                            {{-- {{ $data -> req_no }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="req_date" class="col-sm-2 col-form-label">Tanggal Permintaan</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="req_date" id="req_id" value="{{ $data -> req_date }}" readonly>
                            {{-- {{ $data -> req_date }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="req_name" class="col-sm-2 col-form-label">Nama Pemohon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='req_name' id="req_name" value="{{ $data -> req_name }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="req_hp" class="col-sm-2 col-form-label">Nomor HP Pemohon</label>
                        <div class="col-sm-10">
                            <input type="int" class="form-control" name='req_hp' id="req_hp" value="{{ $data -> req_hp }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="req_vendor" class="col-sm-2 col-form-label">Nama Vendor Permintaan</label>
                        <div class="col-sm-10">
                            <select name="req_vendor" id="req_vendor" class="form-control" required>
                                <option value="{{ $data -> req_vendor }}">{{ $data -> req_vendor }}</option>
                                <option value="BFI">BFI</option>
                                <option value="BIG">BIG</option>
                                <option value="PT MAS">PT MAS</option>
                                <option value="BRSS">BRSS</option>
                                <option value="SPS">SPS</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="req_type" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <select name="req_type" id="req_type" class="form-control" required>
                                <option value="{{ $data -> req_type }}">{{ $data -> req_type }}</option>
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
                        <label for="req_size" class="col-sm-2 col-form-label">Ukuran Freezer</label>
                        <div class="col-sm-10">
                            <select name="req_size" id="req_size" class="form-control" required>
                                <option value="{{ $data -> req_size }}">{{ $data -> req_size }}</option>
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
                        <label for="req_total" class="col-sm-2 col-form-label">Jumlah Permintaan Freezer</label>
                            <div class="col-sm-10">
                                <input type="int" class="form-control" name='req_total' id="req_total" value="{{ $data -> req_total }}" required>
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