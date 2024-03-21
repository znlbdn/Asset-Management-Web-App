@extends('layouts.master')
@section('title', 'SFM - Master Freezer')
@section('master-freezer', 'active')
@section('master', 'show')
@section('master-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Freezer</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('master-freezer') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke Master Freezer
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('master-freezer/'.$data -> key_number) }}' method='post'>
                @csrf
                @method('PUT')
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="key_number" class="col-sm-2 col-form-label">Key Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="key_number" id="key_number" value="{{ $data -> key_number }}" readonly>
                            {{-- {{ $data -> key_number }} --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="freezer_owner" class="col-sm-2 col-form-label">Freezer Owner</label>
                        <div class="col-sm-10">
                            <select name="freezer_owner" id="freezer_owner" class="form-control" required>
                                <option value="{{ $data -> Freezer_Owner }}">{{ $data -> Freezer_Owner }}</option>
                                <option value="OWN (Kepemilikan Sendiri)">OWN (Kepemilikan Sendiri)</option>
                                <option value="JPB (Join Business Partner)">JPB (Join Business Partner)</option>
                                <option value="RENT (Penyewaan)">RENT (Penyewaan)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="supplier" class="col-sm-2 col-form-label">Supplier</label>
                        <div class="col-sm-10">
                            <select name="supplier" id="supplier" class="form-control" required>
                                <option value="{{ $data -> Supplier }}">{{ $data -> Supplier }}</option>
                                <option value="BFI">BFI</option>
                                <option value="BIG">BIG</option>
                                <option value="PT MAS">PT MAS</option>
                                <option value="BRSS">BRSS</option>
                                <option value="SPS">SPS</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <select name="brand" id="brand" class="form-control" required>
                                <option value="{{ $data -> Brand }}">{{ $data -> Brand }}</option>
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
                        <label for="batch_po" class="col-sm-2 col-form-label">Batch PO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='batch_po' id="batch_po" value="{{ $data -> BatchPO }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select name="type" id="type" class="form-control" required>
                                <option value="{{ $data -> Type }}">{{ $data -> Type }}</option>
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
                        <label for="barcode" class="col-sm-2 col-form-label">Barcode FA Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='barcode' id="barcode" value="{{ $data -> BarcodeFANumber }}" required>
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