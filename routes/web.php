<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Keuangan\HeaderJournalController;
use App\Http\Controllers\Keuangan\JournalController;
use App\Http\Controllers\Home;
use App\Http\Controllers\Keuangan\AuthorizeMutasiController;
use App\Http\Controllers\Keuangan\StatusTransaction;
use App\Http\Controllers\OtorizationFirst;
use App\Http\Controllers\ReportStatus;
use App\Http\Controllers\Validasi\CoValidasi;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;
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


// Route::get('/home',function(){
//     dd(Auth::user());
// });

// Route::prefix('dashboard')->name('dashboard.')->group(function(){
//     Route::resource('report',ReportStatus::class);
// });
// Route::prefix('otorization')->name('otorization.')->group(function(){
//     Route::resource('first',OtorizationFirst::class);
// });
// // Route::get('jsonrequest',HeaderJournalController::class,'jsonotorizfirst')->name('jsonrequest');

// //jurnal
// Route::get('addmore/{header}',[JournalController::class,'addmore'])->name('addmore');

// Route::get('ceksaldo/{header}',[JournalController::class,'ceksaldo']);
// // Destroy ajax
// Route::delete('delheader/{id}',[HeaderJournalController::class,'destroy'])->name('delheader');

// Route::get('requestfirst',[HeaderJournalController::class,'jsonotorizfirst'])->name('requestfirst');
// Route::get('test/{id}',[HeaderJournalController::class,'test'])->name('test');

// Route::get('jurnal/{header}',[JournalController::class,'jurnal'])->name('jurnal');
// //user input
// Route::get('release/{id}',[JournalController::class,'makeRelease'])->name('makerelease');



Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('user',UserController::class);
    Route::get('jsonUserAll',[UserController::class,'jsonUserAll'])->name('jsonUserAll');
    Route::get('changepassword/{user}',[UserController::class,'changepassword'])->name('changepassword');
});
Route::prefix('keuangan')->middleware('auth')->name('keuangan.')->group(function(){
    Route::resource('jurnal',JournalController::class);
    Route::resource('header',HeaderJournalController::class);
    Route::resource('authorize-m',AuthorizeMutasiController::class);
    Route::get('headerbytahun',[HeaderJournalController::class,'jsonheaderbytahun'])->name('headerbytahun');
    Route::get('headerauthorizem',[HeaderJournalController::class,'jsonauthorizem'])->name('headerauthorizem');
    Route::post('simpandraft/{do}',[JournalController::class,'storeJurnal'])->name('draftjurnal');
    Route::resource('statustransaksi', StatusTransaction::class);

    Route::resource('reminder-authorize-m', AuthorizeMutasiController::class);
});
Route::middleware('auth')->group(function(){
    Route::get('getcodes/{keterangan}',[CodeController::class,'getcodes']);
    Route::get('loadcode',[CodeController::class,'loadjson']);
    Route::get('jsoncode',[CodeController::class,'jsoncode'])->name('jsoncode');
    Route::get('/', function(){
        return view('welcome');
    });
    Route::get('jsontransaksi/{id}',[JournalController::class,'jsontransaksi']);
    Route::get('getcodeinfo/{id}',[JournalController::class,'getcodeinfo']);
    Route::get('getdatatransaksi/{id}',[JournalController::class,'getdatatransaksi']);

    Route::get('jsonresultjurnal/{code}/{id}',[JournalController::class,'jsonresultjurnal']);
});