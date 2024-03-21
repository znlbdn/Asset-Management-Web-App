<?php

use App\Http\Controllers\EformBillingController;
use App\Http\Controllers\EformPengembalianController;
use App\Http\Controllers\EformPermintaanController;
use App\Http\Controllers\HistoryFreezerController;
use App\Http\Controllers\LastpostFreezerController;
use App\Http\Controllers\MasterAreaController;
use App\Http\Controllers\MasterFreezerController;
use App\Http\Controllers\MasterOutletController;
use App\Http\Controllers\MasterVendorController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });

    Route::resource('master-area', MasterAreaController::class);

    Route::get('/export/area', [MasterAreaController::class, 'export']);

    Route::post('/import-area', [MasterAreaController::class, 'importArea']) -> name('import-area');

    Route::resource('master-freezer', MasterFreezerController::class);

    Route::get('/export/freezer', [MasterFreezerController::class, 'export']);

    Route::post('/import-freezer', [MasterFreezerController::class, 'importFreezer']) -> name('import-freezer');

    Route::resource('master-outlet', MasterOutletController::class);

    Route::get('/export/outlet', [MasterOutletController::class, 'export']);

    Route::post('/import-outlet', [MasterOutletController::class, 'importOutlet']) -> name('import-outlet');

    Route::resource('master-vendor', MasterVendorController::class);

    Route::get('/export/vendor', [MasterVendorController::class, 'export']);

    Route::post('/import-vendor', [MasterVendorController::class, 'importVendor']) -> name('import-vendor');

    Route::resource('eform-permintaan', EformPermintaanController::class);

    Route::get('/export/request', [EformPermintaanController::class, 'export']);
    
    Route::resource('eform-pengembalian', EformPengembalianController::class);

    Route::get('/export/pengembalian', [EformPengembalianController::class, 'export']);
    
    Route::resource('eform-billing', EformBillingController::class);

    Route::get('/export/billing', [EformBillingController::class, 'export']);

    Route::resource('mutasi', MutasiController::class);

    Route::get('/history', [HistoryFreezerController::class, 'index']);

    Route::get('/lastposition', [LastpostFreezerController::class, 'index']);

    Route::get('/filter-last-post', [LastpostFreezerController::class, 'filter']) -> name('filter-last-post');
    
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/dashboard');
});

