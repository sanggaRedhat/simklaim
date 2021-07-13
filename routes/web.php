<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\HeaderJournalController;
use App\Http\Controllers\Home;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\Validasi\CoValidasi;
use App\Models\Journal;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Home::class,'index']);
Route::prefix('transaksi')->name('transaksi.')->group(function(){
    Route::resource('jurnal',JournalController::class);
    Route::resource('header',HeaderJournalController::class);
});

Route::post('simpandraft/{do}',[JournalController::class,'storeJurnal'])->name('draftjurnal');

//jurnal
Route::get('addmore/{header}',[JournalController::class,'addmore'])->name('addmore');
Route::get('getcodes/{keterangan}',[CodeController::class,'getcodes']);
Route::get('ceksaldo/{header}',[JournalController::class,'ceksaldo']);

// Destroy ajax
Route::delete('delheader/{id}',[HeaderJournalController::class,'destroy'])->name('delheader');

Route::get('headerbytahun',[HeaderJournalController::class,'jsonheaderbytahun'])->name('headerbytahun');

Route::get('test/{id}',[HeaderJournalController::class,'test'])->name('test');
Route::get('jsoncode',[CodeController::class,'jsoncode'])->name('jsoncode');
Route::get('jurnal/{header}',[JournalController::class,'jurnal'])->name('jurnal');
Route::get('loadcode',[CodeController::class,'loadjson']);