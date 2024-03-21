<?php

namespace App\Http\Controllers;

use App\Exports\VendorExport;
use App\Imports\VendorImport;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MasterVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Vendor::where('kode_vendor', 'like', "%$katakunci%")
            ->orWhere('nama_vendor', 'like', "%$katakunci%")
            ->orWhere('npwp', 'like', "%$katakunci%")
            ->orWhere('pic', 'like', "%$katakunci%")
            ->orWhere('hp', 'like', "%$katakunci%")
            ->orWhere('alamat', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = Vendor::orderBy('kode_vendor', 'asc')->paginate(10);
        }
        return view('master-vendor.master-vendor')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('kode_vendor', $request -> kode_vendor);
        Session::flash('nama_vendor', $request -> nama_vendor);
        Session::flash('npwp', $request -> npwp);
        Session::flash('pic', $request -> pic);
        Session::flash('hp', $request -> hp);
        Session::flash('alamat', $request -> alamat);

        $request -> validate(
            [
                'kode_vendor' => 'required',
                'nama_vendor' => 'required',
                'npwp' => 'required',
                'pic' => 'required',
                'hp' => 'required',
                'alamat' => 'required'
            ],
            [
                'kode_vendor' => 'Kode Vendor Tidak Boleh Kosong!',
                'nama_vendor' => 'Nama Vendor Tidak Boleh Kosong!',
                'npwp' => 'Nomor NPWP Tidak Boleh Kosong!',
                'pic' => 'Nama PIC Vendor Tidak Boleh Kosong!',
                'hp' => 'Nomor Hp vendor Tidak Boleh Kosong!',
                'alamat' => 'Alamat vendor Tidak Boleh Kosong!',
            ]
        );

        $data = [
            'kode_vendor' => $request -> input('kode_vendor'),
            'nama_vendor' => $request -> input('nama_vendor'),
            'npwp' => $request -> input('npwp'),
            'pic' => $request -> input('pic'),
            'hp' => $request -> input('hp'),
            'alamat' => $request -> input('alamat')
        ];

        Vendor::create($data);
        return redirect() -> to('master-vendor') -> with('success', 'Selamat, Data Vendor Berhasil ditambahkan!');
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
        $data = Vendor::where('kode_vendor', $id)->first();
        return view('master-vendor.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'nama_vendor' => 'required',
                'npwp' => 'required',
                'pic' => 'required',
                'hp' => 'required',
                'alamat' => 'required'
            ],
            [
                'nama_vendor' => 'Nama Vendor Tidak Boleh Kosong!',
                'npwp' => 'Nomor NPWP Tidak Boleh Kosong!',
                'pic' => 'Nama PIC Vendor Tidak Boleh Kosong!',
                'hp' => 'Nomor Hp vendor Tidak Boleh Kosong!',
                'alamat' => 'Alamat vendor Tidak Boleh Kosong!',
            ]
        );

        $data = [
            'nama_vendor' => $request -> input('nama_vendor'),
            'npwp' => $request -> input('npwp'),
            'pic' => $request -> input('pic'),
            'hp' => $request -> input('hp'),
            'alamat' => $request -> input('alamat')
        ];

        Vendor::where('kode_vendor', $id)->update($data);
        return redirect() -> to('master-vendor') -> with('success', 'Selamat, Data Vendor Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vendor::where('kode_vendor', $id)->delete();
        return redirect() -> to('master-vendor') -> with('success', 'Selamat, Data Vendor Berhasil dihapus!');
    }

    public function export(){
        return Excel::download(new VendorExport, "master_vendor_freezer.xlsx");
    }

    public function importVendor(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('MasterVendor', $namaFile);

        Excel::import(new VendorImport, public_path('/MasterVendor/'.$namaFile));
        return redirect() -> to('master-vendor') -> with('success', 'Selamat, Data Vendor Berhasil diimport!');
    }
}
