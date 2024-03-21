<?php

namespace App\Http\Controllers;

use App\Exports\ExportArea;
use App\Imports\AreaImport;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MasterAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Area::where('Kode', 'like', "%$katakunci%")
            ->orWhere('Nama_Area', 'like', "%$katakunci%")
            ->orWhere('Keterangan', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = Area::orderBy('Kode', 'asc')->paginate(10);
        }

        return view('master-area.master-area')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('kode', $request -> kode);
        Session::flash('nama_area', $request -> nama_area);
        Session::flash('keterangan', $request -> keterangan);

        $request -> validate(
            [
                'kode' => 'required',
                'nama_area' => 'required',
                'keterangan' => 'required'
            ],
            [
                'kode.required' => 'Kode Tidak Boleh Kosong!',
                'nama_area.required' => 'Nama Area Tidak Boleh Kosong!',
                'keterangan.required' => 'Keterangan Tidak Boleh Kosong!'
            ]
        );

        $data = [
            'Kode' => $request -> input('kode'),
            'Nama_Area' => $request -> input('nama_area'),
            'Keterangan' => $request -> input('keterangan')
        ];

        Area::create($data);
        return redirect() -> to('master-area') -> with('success', 'Selamat, Data Area Berhasil ditambahkan!');
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
        $data = Area::where('kode', $id)->first();
        return view('master-area.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate(
            [
                'nama_area' => 'required',
                'keterangan' => 'required'
            ],
            [
                'nama_area.required' => 'Nama Area Tidak Boleh Kosong!',
                'keterangan.required' => 'Keterangan Tidak Boleh Kosong!'
            ]
        );

        $data = [
            'Nama_Area' => $request -> nama_area,
            'Keterangan' => $request -> keterangan
        ];

        Area::where('kode', $id)->update($data);
        return redirect() -> to('master-area') -> with('success', 'Selamat, Data Area Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Area::where('kode', $id)->delete();
        return redirect() -> to('master-area') -> with('success', 'Selamat, Data Area Berhasil dihapus!');
    }

    /**
     * Export file to excel.
     */
    public function export(){
        return Excel::download(new ExportArea, "master_area_freezer.xlsx");
    }

    public function importArea(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('MasterArea', $namaFile);

        Excel::import(new AreaImport, public_path('/MasterArea/'.$namaFile));
        return redirect() -> to('master-area') -> with('success', 'Selamat, Data Area Berhasil diimport!');
    }
}
