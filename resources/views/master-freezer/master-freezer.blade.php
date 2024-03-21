@extends('layouts.master')
@section('title', 'SFM - Master Freezer')
@section('master-freezer', 'active')
@section('master', 'show')
@section('master-active', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Master Freezer</h1>
        <a href="{{ url('/export/freezer') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                <div class="d-sm-flex flex-row">
                    <a href="{{ url('/master-freezer/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-fw fa-plus-square"></i>
                        Tambah Data Freezer
                    </a>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-3" data-target="#ImportFreezer" type="button" data-toggle="modal">
                        <i class="fas fa-fw fa-table"></i>
                        Import from Excel
                    </button>
                </div>
                <form class="d-flex" action="{{ url('master-freezer') }}" method="get">
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
                            <th class="text-center">Key Number</th>
                            <th class="text-center">Freezer Owner</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Batch PO</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Barcode FA Number</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data -> firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item -> key_number }}</td>
                            <td>{{ $item -> Freezer_Owner }}</td>
                            <td>{{ $item -> Supplier }}</td>
                            <td>{{ $item -> Brand }}</td>
                            <td>{{ $item -> BatchPO }}</td>
                            <td>{{ $item -> Type }}</td>
                            <td>{{ $item -> BarcodeFANumber }}</td>
                            <td class="text-center">
                                <a href="{{ url('master-freezer/'.$item->key_number.'/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></i></a>
                                <form onsubmit="return confirm('Data dengan nomor freezer {{ $item->key_number }} akan dihapus. Yakin akan menghapus data?')" class="d-inline" action="{{ url('master-freezer/'.$item -> key_number) }}" method="POST">
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
                {{ $data -> links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ImportFreezer" tabindex="-1" role="dialog" aria-labelledby="ImportFreezerLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ImportFreezerLabel">Import Data Freezer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('import-freezer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <img src="{{ asset('SB-Admin-2') }}/img/upload-data.png" style="max-width: 200px">
                        <div class="form-group">
                            <input type="file" name="file" class="form-control-file" id="FreezerFormFile" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
