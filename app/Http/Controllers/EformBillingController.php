<?php

namespace App\Http\Controllers;

use App\Exports\BillingExport;
use App\Models\Eformbilling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class EformBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Eformbilling::where('bil_no', 'like', "%$katakunci%")
            ->orWhere('bil_date', 'like', "%$katakunci%")
            ->orWhere('bil_code', 'like', "%$katakunci%")
            ->orWhere('bil_vendor', 'like', "%$katakunci%")
            ->orWhere('bil_type', 'like', "%$katakunci%")
            ->orWhere('bil_size', 'like', "%$katakunci%")
            ->orWhere('bil_total', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = Eformbilling::orderBy('bil_no', 'asc')->paginate(10);
        }
        return view('eform-billing.eform-billing')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eform-billing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('bil_no', $request -> bil_no);
        Session::flash('bil_date', $request -> bil_date);
        Session::flash('bil_code', $request -> bil_code);
        Session::flash('bil_vendor', $request -> bil_vendor);
        Session::flash('bil_type', $request -> bil_type);
        Session::flash('bil_size', $request -> bil_size);
        Session::flash('bil_total', $request -> bil_total);

        $request -> validate(
            [
                'bil_no' => 'required',
                'bil_date' => 'required',
                'bil_code' => 'required',
                'bil_vendor' => 'required',
                'bil_type' => 'required',
                'bil_size' => 'required',
                'bil_total' => 'required'
            ],
            [
                'bil_no' => 'Nomor Billing Tidak Boleh Kosong!',
                'bil_date' => 'Tanggal Billing Tidak Boleh Kosong!',
                'bil_code' => 'Kode Freezer Billing Tidak Boleh Kosong!',
                'bil_vendor' => 'Asal Vendor Billing Tidak Boleh Kosong!',
                'bil_type' => 'Type Freezer Billing Tidak Boleh Kosong!',
                'bil_size' => 'Ukuran Freezer Billing Tidak Boleh Kosong!',
                'bil_total' => 'Jumlah Total Freezer Billing Tidak Boleh Kosong!' 
            ]
        );

        $data = [
            'bil_no' => $request -> input('bil_no'),
            'bil_date' => $request -> input('bil_date'),
            'bil_code' => $request -> input('bil_code'),
            'bil_vendor' => $request -> input('bil_vendor'),
            'bil_type' => $request -> input('bil_type'),
            'bil_size' => $request -> input('bil_size'),
            'bil_total' => $request -> input('bil_total')
        ];

        Eformbilling::create($data);
        return redirect() -> to('eform-billing') -> with('success', 'Selamat, Data Billing Berhasil ditambahkan!');
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
        $data = Eformbilling::where('bil_no', $id)->first();
        return view('eform-billing.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'bil_code' => 'required',
                'bil_vendor' => 'required',
                'bil_type' => 'required',
                'bil_size' => 'required',
                'bil_total' => 'required'
            ],
            [
                'bil_code' => 'Kode Freezer Billing Tidak Boleh Kosong!',
                'bil_vendor' => 'Asal Vendor Billing Tidak Boleh Kosong!',
                'bil_type' => 'Type Freezer Billing Tidak Boleh Kosong!',
                'bil_size' => 'Ukuran Freezer Billing Tidak Boleh Kosong!',
                'bil_total' => 'Jumlah Total Freezer Billing Tidak Boleh Kosong!' 
            ]
        );

        $data = [
            'bil_code' => $request -> input('bil_code'),
            'bil_vendor' => $request -> input('bil_vendor'),
            'bil_type' => $request -> input('bil_type'),
            'bil_size' => $request -> input('bil_size'),
            'bil_total' => $request -> input('bil_total')
        ];

        Eformbilling::where('bil_no', $id)->update($data);
        return redirect() -> to('eform-billing') -> with('success', 'Selamat, Data Billing Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Eformbilling::where('bil_no', $id)->delete();
        return redirect() -> to('eform-billing') ->with('success', 'Selamat, Data Billing Berhasil dihapus!'); 
    }

    public function export(){
        return Excel::download(new BillingExport, "form_billing_freezer.xlsx");
    }
}
