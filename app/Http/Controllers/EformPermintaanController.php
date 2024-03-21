<?php

namespace App\Http\Controllers;

use App\Exports\RequestExport;
use App\Models\Eformpermintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class EformPermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Eformpermintaan::where('req_no', 'like', "%$katakunci%")
            ->orWhere('req_date', 'like', "%$katakunci%")
            ->orWhere('req_name', 'like', "%$katakunci%")
            ->orWhere('req_hp', 'like', "%$katakunci%")
            ->orWhere('req_vendor', 'like', "%$katakunci%")
            ->orWhere('req_type', 'like', "%$katakunci%")
            ->orWhere('req_size', 'like', "%$katakunci%")
            ->orWhere('req_total', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = Eformpermintaan::orderBy('req_no', 'asc')->paginate(10);
        }
        return view('eform-permintaan.eform-permintaan')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eform-permintaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('req_no', $request -> req_no);
        Session::flash('req_date', $request -> req_date);
        Session::flash('req_name', $request -> req_name);
        Session::flash('req_hp', $request -> req_hp);
        Session::flash('req_vendor', $request -> req_vendor);
        Session::flash('req_type', $request -> req_type);
        Session::flash('req_size', $request -> req_size);
        Session::flash('req_total', $request -> req_total);

        $request -> validate(
            [
                'req_no' => 'required',
                'req_date' => 'required',
                'req_name' => 'required',
                'req_hp' => 'required',
                'req_vendor' => 'required',
                'req_type' => 'required',
                'req_size' => 'required',
                'req_total' => 'required',
            ],
            [
                'req_no' => 'Nomor Permintaan Tidak Boleh Kosong!',
                'req_date' => 'Tanggal Permintaan Tidak Boleh Kosong!',
                'req_name' => 'Pemohon Permintaan Tidak Boleh Kosong!',
                'req_hp' => 'Nomor Hp Pemohon Permintaan Tidak Boleh Kosong!',
                'req_vendor' => 'Nama Vendor Permintaan Tidak Boleh Kosong!',
                'req_type' => 'Type Freezer Permintaan Tidak Boleh Kosong!',
                'req_size' => 'Ukuran Freezer Permintaan Tidak Boleh Kosong!',
                'req_total' => 'Total Permintaan Tidak Boleh Kosong!',
            ]
        );

        $data = [
            'req_no' => $request -> input('req_no'),
            'req_date' => $request -> input('req_date'),
            'req_name' => $request -> input('req_name'),
            'req_hp' => $request -> input('req_hp'),
            'req_vendor' => $request -> input('req_vendor'),
            'req_type' => $request -> input('req_type'),
            'req_size' => $request -> input('req_size'),
            'req_total' => $request -> input('req_total'),
        ];

        Eformpermintaan::create($data);
        return redirect() -> to('eform-permintaan') -> with('success', 'Selamat, Data Permintaan Berhasil ditambahkan!');
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
        $data = Eformpermintaan::where('req_no', $id)->first();
        return view('eform-permintaan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'req_name' => 'required',
                'req_hp' => 'required',
                'req_vendor' => 'required',
                'req_type' => 'required',
                'req_size' => 'required',
                'req_total' => 'required',
            ],
            [
                'req_name' => 'Pemohon Permintaan Tidak Boleh Kosong!',
                'req_hp' => 'Nomor Hp Pemohon Permintaan Tidak Boleh Kosong!',
                'req_vendor' => 'Nama Vendor Permintaan Tidak Boleh Kosong!',
                'req_type' => 'Type Freezer Permintaan Tidak Boleh Kosong!',
                'req_size' => 'Ukuran Freezer Permintaan Tidak Boleh Kosong!',
                'req_total' => 'Total Permintaan Tidak Boleh Kosong!',
            ]
        );

        $data = [
            'req_name' => $request -> input('req_name'),
            'req_hp' => $request -> input('req_hp'),
            'req_vendor' => $request -> input('req_vendor'),
            'req_type' => $request -> input('req_type'),
            'req_size' => $request -> input('req_size'),
            'req_total' => $request -> input('req_total'),
        ];

        Eformpermintaan::where('req_no', $id)->update($data);
        return redirect() -> to('eform-permintaan') -> with('success', 'Selamat, Data Permintaan Berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Eformpermintaan::where('req_no', $id)->delete();
        return redirect() -> to('eform-permintaan') -> with('succcess', 'Selamat, Data Permintaan Berhasil dihapus!');
    }

    public function export(){
        return Excel::download(new RequestExport, "form_permintaan_freezer.xlsx");
    }
}
