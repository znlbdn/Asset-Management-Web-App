<?php

namespace App\Http\Controllers;

use App\Exports\PengembalianExport;
use App\Models\Eformpengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class EformPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Eformpengembalian::where('ret_no', 'like', "%$katakunci%")
            ->orWhere('ret_date', 'like', "%$katakunci%")
            ->orWhere('ret_kode', 'like', "%$katakunci%")
            ->orWhere('ret_back', 'like', "%$katakunci%")
            ->orWhere('ret_type', 'like', "%$katakunci%")
            ->orWhere('ret_size', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = Eformpengembalian::orderBy('ret_no', 'asc')->paginate(10);
        }
        return view('eform-pengembalian.eform-pengembalian')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eform-pengembalian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ret_no', $request -> ret_no);
        Session::flash('ret_date', $request -> ret_date);
        Session::flash('ret_kode', $request -> ret_kode);
        Session::flash('ret_back', $request -> ret_back);
        Session::flash('ret_type', $request -> ret_type);
        Session::flash('ret_size', $request -> ret_size);

        $request -> validate(
            [
                'ret_no' => 'required',
                'ret_date' => 'required',
                'ret_kode' => 'required',
                'ret_back' => 'required',
                'ret_type' => 'required',
                'ret_size' => 'required',
            ],
            [
                'ret_no' => 'Nomor Pengembalian Tidak Boleh Kosong!',
                'ret_date' => 'Tanggal Pengembalian Tidak Boleh Kosong!',
                'ret_kode' => 'Kode Freezer Pengembalian Tidak Boleh Kosong!',
                'ret_back' => 'Tujuan Pengembalian Tidak Boleh Kosong!',
                'ret_type' => 'Type Freezer Pengembalian Tidak Boleh Kosong!',
                'ret_size' => 'Ukuran Freezer Pengembalian Tidak Boleh Kosong!',
            ]
        );

        $data = [
            'ret_no' => $request -> input('ret_no'),
            'ret_date' => $request -> input('ret_date'),
            'ret_kode' => $request -> input('ret_kode'),
            'ret_back' => $request -> input('ret_back'),
            'ret_type' => $request -> input('ret_type'),
            'ret_size' => $request -> input('ret_size'),
        ];

        Eformpengembalian::create($data);
        return redirect() -> to('eform-pengembalian') -> with('success', 'Selamat, Data Pengembalian Berhasil ditambahkan!');
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
        $data = Eformpengembalian::where('ret_no', $id)->first();
        return view('eform-pengembalian.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'ret_kode' => 'required',
                'ret_back' => 'required',
                'ret_type' => 'required',
                'ret_size' => 'required',
            ],
            [
                'ret_kode' => 'Kode Freezer Pengembalian Tidak Boleh Kosong!',
                'ret_back' => 'Tujuan Pengembalian Tidak Boleh Kosong!',
                'ret_type' => 'Type Freezer Pengembalian Tidak Boleh Kosong!',
                'ret_size' => 'Ukuran Freezer Pengembalian Tidak Boleh Kosong!',
            ]
        );

        $data = [
            'ret_kode' => $request -> input('ret_kode'),
            'ret_back' => $request -> input('ret_back'),
            'ret_type' => $request -> input('ret_type'),
            'ret_size' => $request -> input('ret_size'),
        ];

        Eformpengembalian::where('ret_no', $id)->update($data);
        return redirect() -> to('eform-pengembalian') -> with('success', 'Selamat, Data Pengembalian Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Eformpengembalian::where('ret_no', $id)->delete();
        return redirect() -> to('eform-pengembalian') -> with('success', 'Selamat, Data Pengembalian Berhasil dihapus');
    }

    public function export(){
        return Excel::download(new PengembalianExport, "form_pengembalian_freezer.xlsx");
    }
}
