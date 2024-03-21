@extends('layouts.master')
@section('title', 'SFM - Mutasi Freezer')
@section('mutasi', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Mutasi</h1>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('mutasi') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    Kembali ke Mutasi Freezer
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('component/message')
            <form action='{{ url('mutasi/'.$data -> freezer_code) }}' method='post'>
                @csrf
                @method("PUT")
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="mutation_date" class="col-sm-2 col-form-label">Tanggal Mutasi</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name='mutation_date' id="mutation_date" value="{{ $data -> mutation_date }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mutation_ori" class="col-sm-2 col-form-label">Mutasi Asal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='mutation_ori' id="mutation_ori" value="{{ $data -> mutation_ori }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mutation_to" class="col-sm-2 col-form-label">Mutasi Tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='mutation_to' id="mutation_to" value="{{ $data -> mutation_to }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="code_freezer" class="col-sm-2 col-form-label">Kode Freezer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='code_freezer' id="code_freezer" value="{{ $data -> code_freezer }}">
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