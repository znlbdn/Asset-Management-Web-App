<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryFreezerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('freezer_movement')
        ->select('freezer_movement.*', 'master_outletr1.custname', 'master_outletr1.Tipe', 'master_outletr1.address')
        ->leftJoin('master_outletr1', 'freezer_movement.IDBelfoodd', '=', 'master_outletr1.custid')
        ->where('freezer_movement.tanggal', '<=', 0)
        ->orderBy('freezer_movement.tanggal', 'asc')
        ->orderBy('freezer_movement.urut', 'asc')
        ->paginate(10);

        return view('pages.history')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
