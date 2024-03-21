@extends('layouts.master')
@section('title', 'SFM - E-form Permintaan')
@section('eform-permintaan', 'active')
@section('eform', 'show')
@section('eform-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">E-form Permintaan</h1>
        <a href="{{ url('/export/request') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                <a href="{{ url('/eform-permintaan/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-fw fa-plus-square"></i>
                    Tambah Permintaan
                </a>
                <form class="d-flex" action="{{ url('eform-permintaan') }}" method="get">
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
                            <th class="text-center">Pemohon</th>
                            <th class="text-center">Nomor Hp</th>
                            <th class="text-center">Asal Vendor</th>
                            <th class="text-center">Type Freezer</th>
                            <th class="text-center">Ukuran Freezer</th>
                            <th class="text-center">Jumlah Freezer</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data -> firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item -> req_no }}</td>
                            <td>{{ $item -> req_date }}</td>
                            <td>{{ $item -> req_name }}</td>
                            <td>{{ $item -> req_hp }}</td>
                            <td>{{ $item -> req_vendor }}</td>
                            <td>{{ $item -> req_type }}</td>
                            <td>{{ $item -> req_size }}</td>
                            <td>{{ $item -> req_total }}</td>
                            <td class="text-center">
                                <a href="{{ url('eform-permintaan/'.$item->req_no.'/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></i></a>
                                <form onsubmit="return confirm('Data dengan nomor permintaan {{ $item->req_no }} akan dihapus. Yakin akan menghapus data?')" class="d-inline" action="{{ url('eform-permintaan/'.$item -> req_no) }}" method="POST">
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
