@extends('layouts.master')
@section('title', 'SFM - E-form Pengembalian')
@section('eform-pengembalian', 'active')
@section('eform', 'show')
@section('eform-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">E-form Pengembalian</h1>
        <a href="{{ url('/export/pengembalian') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white"></i>
            Download Data
        </a>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">
    @include('component/message')

    <!-- Table Data -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="{{ url('/eform-pengembalian/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-plus-square"></i>
                    Tambah Pengembalian
                </a>
                <form class="d-flex" action="{{ url('eform-pengembalian') }}" method="get">
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
                            <th class="text-center">Nomor</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Kode Freezer</th>
                            <th class="text-center">Tujuan Kembali</th>
                            <th class="text-center">Type Freezer</th>
                            <th class="text-center">Ukuran Freezer</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data -> firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item -> ret_no }}</td>
                            <td>{{ $item -> ret_date }}</td>
                            <td>{{ $item -> ret_kode }}</td>
                            <td>{{ $item -> ret_back }}</td>
                            <td>{{ $item -> ret_type }}</td>
                            <td>{{ $item -> ret_size }}</td>
                            <td class="text-center">
                                <a href="{{ url('eform-pengembalian/'.$item -> ret_no.'/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></i></a>
                                <form onsubmit="return confirm('Data dengan nomor pengembalian {{ $item->ret_no }} akan dihapus. Yakin akan menghapus data?')" class="d-inline" action="{{ url('eform-pengembalian/'.$item -> ret_no) }}" method="POST">
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
