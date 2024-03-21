@extends('layouts.master')
@section('title', 'SFM - History Freezer')
@section('history', 'active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">History Freezer</h1>
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
                            <th class="text-center">Belfoods ID</th>
                            <th class="text-center">Distributor ID</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">No Source</th>
                            <th class="text-center">No Source 2</th>
                            <th class="text-center">urut</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data -> firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item -> key_number }}</td>
                            <td>{{ $item -> IDBelfoodd }}</td>
                            <td>{{ $item -> DistributorID }}</td>
                            <td>{{ $item -> Tanggal }}</td>
                            <td>{{ $item -> Status }}</td>
                            <td>{{ $item -> Keterangan }}</td>
                            <td>{{ $item -> No_Source }}</td>
                            <td>{{ $item -> no_source2 }}</td>
                            <td>{{ $item -> urut }}</td>
                            <td>{{ $item -> custname }}</td>
                            <td>{{ $item -> Tipe }}</td>
                            <td>{{ $item -> address }}</td>
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