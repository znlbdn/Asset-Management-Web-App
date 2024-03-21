@extends('layouts.master')
@section('title', 'SFM - Last Position Freezer')
@section('lastposition', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Last Position Freezer</h1>
        {{-- <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white"></i>
            Download Data
        </button> --}}
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider mb-4">

    <!-- Table Data -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex flex-row">
                <div class="col-md-2">
                    <label for="start_date">From Date:</label>
                    <input type="date" name="start_date" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="end_date">To Date:</label>
                    <input type="date" name="end_date" class="form-control">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Key Number</th>
                            <th class="text-center">Freezer Owner</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Batch PO</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">BarcodeFANumber</th>
                            <th class="text-center">Posisi Freezer</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Alamat</th>
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
                            <td>{{ $item -> Posisi_Freezer }}</td>
                            <td>{{ $item -> Status1 }}</td>
                            <td>{{ $item -> custname }}</td>
                            <td>{{ $item -> tipe }}</td>
                            <td>{{ $item -> address }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info btn-sm"><i class="fas fa-fw fa-search"></i> Search</a>
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
@endsection