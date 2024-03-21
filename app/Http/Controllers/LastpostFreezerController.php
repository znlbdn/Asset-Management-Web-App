<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LastpostFreezerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table(DB::raw("(SELECT *, u1127157_smf.FCari_last(key_number, '2023-11-23', '0') as Posisi_Freezer, u1127157_smf.FCari_last(key_number, '2023-11-23', '1') as Status1 FROM u1127157_smf.master_freezer) as r"))
        ->select('r.*',
                DB::raw('(SELECT j.custname FROM u1127157_smf.master_outletr1 j 
                 WHERE j.custid = r.Posisi_Freezer) as custname'),
                DB::raw('(SELECT j.tipe FROM u1127157_smf.master_outletr1 j 
                 WHERE j.custid = r.Posisi_Freezer) as tipe'),
                DB::raw('(SELECT j.address FROM u1127157_smf.master_outletr1 j 
                 WHERE j.custid = r.Posisi_Freezer) as address'))
         ->whereNotNull('r.Posisi_Freezer')
         ->paginate(10);

         return view('pages.lastposition')->with('data', $data);
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

    public function filter(Request $request){
        $start_date = $request -> start_date;
        $end_date = $request -> end_date;

        $lastPost = DB::table(DB::raw("(SELECT *, u1127157_smf.FCari_last(key_number, '2023-11-23', '0') as Posisi_Freezer, u1127157_smf.FCari_last(key_number, '2023-11-23', '1') as Status1 FROM u1127157_smf.master_freezer) as r"))
        ->select('r.*',
                DB::raw('(SELECT j.custname FROM u1127157_smf.master_outletr1 j 
                 WHERE j.custid = r.Posisi_Freezer) as custname'),
                DB::raw('(SELECT j.tipe FROM u1127157_smf.master_outletr1 j 
                 WHERE j.custid = r.Posisi_Freezer) as tipe'),
                DB::raw('(SELECT j.address FROM u1127157_smf.master_outletr1 j 
                 WHERE j.custid = r.Posisi_Freezer) as address'))
         ->whereNotNull('r.Posisi_Freezer');

        $data = $lastPost::whereData();
    }
}
