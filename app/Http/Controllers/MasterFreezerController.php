<?php

namespace App\Http\Controllers;

use App\Exports\FreezerExport;
use App\Imports\FreezerImport;
use App\Models\Freezer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MasterFreezerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Freezer::where('key_number', 'like', "%$katakunci%")
            ->orWhere('Freezer_Owner', 'like', "%$katakunci%")
            ->orWhere('Supplier', 'like', "%$katakunci%")
            ->orWhere('Brand', 'like', "%$katakunci%")
            ->orWhere('BatchPO', 'like', "%$katakunci%")
            ->orWhere('Type', 'like', "%$katakunci%")
            ->orWhere('BarcodeFANumber', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = Freezer::orderBy('key_number', 'asc')->paginate(10);
        }
        return view('master-freezer.master-freezer')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-freezer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('key_number', $request -> key_number);
        Session::flash('freezer_owner', $request -> freezer_owner);
        Session::flash('supplier', $request -> supplier);
        Session::flash('brand', $request -> brand);
        Session::flash('batch_po', $request -> batch_po);
        Session::flash('type', $request -> type);
        Session::flash('barcode', $request -> barcode);

        $request -> validate(
            [
                'key_number' => 'required',
                'freezer_owner' => 'required',
                'supplier' => 'required',
                'brand' => 'required',
                'batch_po' => 'required',
                'type' => 'required',
                'barcode' => 'required'
            ],
            [
                'key_number' => 'Key Number Tidak Boleh Kosong!',
                'freezer_owner' => 'Freezer Owrner Tidak Boleh Kosong!',
                'supplier' => 'Supplier Tidak Boleh Kosong!',
                'brand' => 'Brand Tidak Boleh Kosong!',
                'batch_po' => 'Bacth PO Tidak Boleh Kosong!',
                'type' => 'Type Tidak Boleh Kosong!',
                'barcode' => 'Barcode Tidak Boleh Kosong!'
            ]
        );

        $data = [
            'key_number' => $request -> input('key_number'),
            'Freezer_Owner' => $request -> input('freezer_owner'),
            'Supplier' => $request -> input('supplier'),
            'Brand' => $request -> input('brand'),
            'BatchPO' => $request -> input('batch_po'),
            'Type' => $request -> input('type'),
            'BarcodeFANumber' => $request -> input('barcode')
        ];

        Freezer::create($data);
        return redirect() -> to('master-freezer') -> with('success', 'Selamat, Data Freezer Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Freezer::where('key_number', $id)->first();
        return view('master-freezer.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'freezer_owner' => 'required',
                'supplier' => 'required',
                'brand' => 'required',
                'batch_po' => 'required',
                'type' => 'required',
                'barcode' => 'required'
            ],
            [
                'freezer_owner' => 'Freezer Owrner Tidak Boleh Kosong!',
                'supplier' => 'Supplier Tidak Boleh Kosong!',
                'brand' => 'Brand Tidak Boleh Kosong!',
                'batch_po' => 'Bacth PO Tidak Boleh Kosong!',
                'type' => 'Type Tidak Boleh Kosong!',
                'barcode' => 'Barcode Tidak Boleh Kosong!'
            ]
        );

        $data = [
            'Freezer_Owner' => $request -> freezer_owner,
            'Supplier' => $request -> supplier,
            'Brand' => $request -> brand,
            'BatchPO' => $request -> batch_po,
            'Type' => $request -> type,
            'BarcodeFANumber' => $request -> barcode
        ];

        Freezer::where('key_number', $id)->update($data);
        return redirect() -> to('master-freezer') -> with('success', 'Selamat, Data Freezer Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Freezer::where('key_number', $id)->delete();
        return redirect() -> to('master-freezer') -> with('success', 'Selamat, Data Freezer Berhasil dihapus!');
    }

    public function export(){
        return Excel::download(new FreezerExport, "master_freezer.xlsx");
    }

    public function importFreezer(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('MasterFreezer', $namaFile);

        Excel::import(new FreezerImport, public_path('/MasterFreezer/'.$namaFile));
        return redirect() -> to('master-freezer') -> with('success', 'Selamat, Data Freezer Berhasil diimport!');
    }
}
