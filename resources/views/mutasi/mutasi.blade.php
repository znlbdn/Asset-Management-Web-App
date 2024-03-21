@extends('layouts.master')
@section('title', 'SFM - Mutasi Freezer')
@section('mutasi', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Mutasi Freezer</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white"></i>
            Download Data
        </button>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <!-- Table Data -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('/mutasi/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-plus-square"></i>
                    Tambah Data Mutasi
                </a>
                <form class="d-flex" action="{{ url('mutasi') }}" method="get">
                    <input class="form-control me-1 mr-sm-2" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari disini..." aria-label="Search">
                    <button class="btn btn-warning" type="submit">Cari</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal Mutasi</th>
                            <th class="text-center">Mutasi Asal</th>
                            <th class="text-center">Mutasi Tujuan</th>
                            <th class="text-center">Kode Freezer</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data -> firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item -> mutation_date }}</td>
                            <td>{{ $item -> mutation_ori }}</td>
                            <td>{{ $item -> mutation_to }}</td>
                            <td>{{ $item -> code_freezer }}</td>
                            <td class="text-center">
                                <a href="{{ url('mutasi/'.$item-> code_freezer.'/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></i></a>
                                <form onsubmit="return confirm('Data pada mutasi freezer dengan nomor freezer {{ $item->code_freezer }} akan dihapus. Yakin akan menghapus data?')" class="d-inline" action="{{ url('mutasi/'.$item -> code_freezer) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection