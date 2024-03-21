@extends('layouts.master')
@section('title', 'SFM - E-form Billing')
@section('eform-billing', 'active')
@section('eform', 'show')
@section('eform-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Edit Billing Freezer</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('eform-billing') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke E-form Billing
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('eform-billing/'.$data -> bil_no) }}' method='post'>
                @csrf
                @method("PUT")
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="bil_no" class="col-sm-2 col-form-label">Nomor Billing</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bil_no" id="bil_no" value="{{ $data -> bil_no }}" readonly>
                            {{-- {{ $data -> bil_no }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bil_date" class="col-sm-2 col-form-label">Tanggal Billing</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="bil_date" id="bil_date" value="{{ $data -> bil_date }}" readonly>
                            {{-- {{ $data -> bil_date }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bil_code" class="col-sm-2 col-form-label">Kode Freezer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='bil_code' id="bil_code" value="{{ $data -> bil_code }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bil_vendor" class="col-sm-2 col-form-label">Asal Vendor</label>
                        <div class="col-sm-10">
                            <select name="bil_vendor" id="bil_vendor" class="form-control" required>
                                <option value="{{ $data -> bil_vendor }}">{{ $data -> bil_vendor }}</option>
                                <option value="BFI">BFI</option>
                                <option value="BIG">BIG</option>
                                <option value="PT MAS">PT MAS</option>
                                <option value="BRSS">BRSS</option>
                                <option value="SPS">SPS</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bil_type" class="col-sm-2 col-form-label">Type Freezer</label>
                        <div class="col-sm-10">
                            <select name="bil_type" id="bil_type" class="form-control" required>
                                <option value="{{ $data -> bil_type }}">{{ $data -> bil_type }}</option>
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
                        <label for="bil_size" class="col-sm-2 col-form-label">Ukuran Frezer</label>
                        <div class="col-sm-10">
                            <select name="bil_size" id="bil_size" class="form-control" required>
                                <option value="{{ $data -> bil_size }}">{{ $data -> bil_size }}</option>
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
                        <label for="bil_total" class="col-sm-2 col-form-label">Jumlah Freezer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='bil_total' id="bil_total" value="{{ $data -> bil_total }}" required>
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