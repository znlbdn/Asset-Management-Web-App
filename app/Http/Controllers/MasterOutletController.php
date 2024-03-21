<?php

namespace App\Http\Controllers;

use App\Exports\OutletExport;
use App\Imports\OutletImport;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MasterOutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Outlet::where('custid', 'like', "%$katakunci%")
            ->orWhere('custname', 'like', "%$katakunci%")
            ->orWhere('Tipe', 'like', "%$katakunci%")
            ->orWhere('address', 'like', "%$katakunci%")
            ->orWhere('latitude', 'like', "%$katakunci%")
            ->orWhere('longitude', 'like', "%$katakunci%")
            ->orWhere('status', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = Outlet::orderBy('custid', 'asc')->paginate(10);
        }
        return view('master-outlet.master-outlet')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('kode_customer', $request -> kode_customer);
        Session::flash('nama_customer', $request -> nama_customer);
        Session::flash('tipe', $request -> tipe);
        Session::flash('alamat', $request -> alamat);
        Session::flash('latitude', $request -> latitude);
        Session::flash('longitude', $request -> longitude);
        Session::flash('status', $request -> status);

        $request -> validate(
            [
                'kode_customer' => 'required',
                'nama_customer' => 'required',
                'tipe' => 'required',
                'alamat' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'status' => 'required'
            ],
            [
                'kode_customer' => 'Kode Customer Tidak Boleh Kosong!',
                'nama_customer' => 'Nama Customer Tidak Boleh Kosong!',
                'tipe' => 'Tipe Outlet Tidak Boleh Kosong!',
                'alamat' => 'Alamat Outlet Tidak Boleh Kosong!',
                'latitude' => 'Latitude Tidak Boleh Kosong!',
                'longitude' => 'Longitude Tidak Boleh Kosong!',
                'status' => 'Status Tidak Boleh Kosong'
            ]
        );

        $data = [
            'custid' => $request -> input('kode_customer'),
            'custname' => $request -> input('nama_customer'),
            'Tipe' => $request -> input('tipe'),
            'address' => $request -> input('alamat'),
            'latitude' => $request -> input('latitude'),
            'longitude' => $request -> input('longitude'),
            'status' => $request -> input('status')
        ];

        Outlet::create($data);
        return redirect() -> to('master-outlet') -> with('success', 'Selamat, Data Outlet Berhasil ditambahkan!');
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
        $data = Outlet::where('custid', $id)->first();
        return view('master-outlet.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'nama_customer' => 'required',
                'tipe' => 'required',
                'alamat' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'status' => 'required'
            ],
            [
                'nama_customer' => 'Nama Customer Tidak Boleh Kosong!',
                'tipe' => 'Tipe Outlet Tidak Boleh Kosong!',
                'alamat' => 'Alamat Outlet Tidak Boleh Kosong!',
                'latitude' => 'Latitude Tidak Boleh Kosong!',
                'longitude' => 'Longitude Tidak Boleh Kosong!',
                'status' => 'Status Tidak Boleh Kosong'
            ]
        );

        $data = [
            'custname' => $request -> nama_customer,
            'Tipe' => $request -> tipe,
            'address' => $request -> alamat,
            'latitude' => $request -> latitude,
            'longitude' => $request -> longitude,
            'status' => $request -> status
        ];

        Outlet::where('custid', $id)->update($data);
        return redirect() -> to('master-outlet') -> with('success', 'Selamat, Data Outlet Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Outlet::where('custid', $id)->delete();
        return redirect() -> to('master-outlet') -> with('success', 'Selamat, Data Outlet Berhasil dihapus!');
    }

    public function export(){
        return Excel::download(new OutletExport, "master_outlet_freezer.xlsx");
    }

    public function importOutlet(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('MasterOutlet', $namaFile);

        Excel::import(new OutletImport, public_path('/MasterOutlet/'.$namaFile));
        return redirect() -> to('master-outlet') -> with('success', 'Selamat, Data Outlet Berhasil diimport!');
    }
}
