<?php

namespace App\Http\Controllers;

use App\Models\MutasiFreezer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = MutasiFreezer::where('mutation_date', 'like', "%$katakunci%")
            ->orWhere('mutation_ori', 'like', "%$katakunci%")
            ->orWhere('mutation_to', 'like', "%$katakunci%")
            ->orWhere('code_freezer', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = MutasiFreezer::orderBy('code_freezer', 'asc')->paginate(10);
        }
        return view('mutasi.mutasi') -> with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mutasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('mutation_date', $request -> mutation_date);
        Session::flash('mutation_ori', $request -> mutation_ori);
        Session::flash('mutation_to', $request -> mutation_from);
        Session::flash('code_freezer', $request -> code_freezer);

        $request -> validate(
            [
                'mutation_date' => 'required',
                'mutation_ori' => 'required',
                'mutation_to' => 'required',
                'code_freezer' => 'required'
            ],
            [
                'mutation_date' => 'Tanggal Mutasi Tidak Boleh Kosong!',
                'mutation_ori' => 'Mutasi Asal Tidak Boleh Kosong!',
                'mutation_to' => 'Mutasi Tujuan Tidak Boleh Kosong!',
                'code_freezer' => 'Kode Freezer Tidak Boleh Kosong!'
            ]
        );

        $data = [
            'mutation_date' => $request -> input('mutation_date'),
            'mutation_ori' => $request -> input('mutation_ori'),
            'mutation_to' => $request -> input('mutation_to'),
            'code_freezer' => $request -> input('code_freezer')
        ];

        MutasiFreezer::create($data);
        return redirect() -> to('mutasi') -> with('success', 'Selamat, Data Mutasi Berhasil ditambahkan!');
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
        $data = MutasiFreezer::where('freezer_code', $id)->first();
        return view('mutasi.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'mutation_ori' => 'required',
                'mutation_to' => 'required',
                'code_freezer' => 'required'
            ],
            [
                'mutation_ori' => 'Mutasi Asal Tidak Boleh Kosong!',
                'mutation_to' => 'Mutasi Tujuan Tidak Boleh Kosong!',
                'code_freezer' => 'Kode Freezer Tidak Boleh Kosong!'
            ]
        );

        $data = [
            'mutation_ori' => $request -> input('mutation_ori'),
            'mutation_to' => $request -> input('mutation_to'),
            'code_freezer' => $request -> input('code_freezer')
        ];

        MutasiFreezer::where('code_freezer', $id) -> update($data);
        return redirect() -> to('mutasi') -> with('success', 'Selamat, Data Mutasi Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MutasiFreezer::where('code_freezer', $id)->delete();
        return redirect() -> to('mutasi') -> with('success', 'Selamat, Data Mutasi Berhasil dihapus!');
    }
}
