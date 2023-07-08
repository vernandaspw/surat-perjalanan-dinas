<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\ArsipCreate;
use App\Http\Livewire\DataPegawaiPage;
use App\Http\Livewire\NppdPage;
use App\Http\Livewire\RincianBiayaPage;
use App\Http\Livewire\SppdPage;
use App\Http\Livewire\SptPage;

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


// Route::get('register',[RegisterUserController::class,'register']);
// Route::post('register',[RegisterUserController::class,'register_process']);

Route::get('login',[RegisterUserController::class,'login'])->name('login');
Route::post('login',[RegisterUserController::class,'login_proses']);


Route::middleware(['auth'])->group(function () {
    Route::get('/',[HomeController::class, 'index']);

    Route::get('akun',[AkunController::class, 'index']);
    Route::get('akun/create',[AkunController::class, 'create']);
    Route::post('akun/create',[AkunController::class, 'store']);
    Route::get('akun/nonaktif/{id}',[AkunController::class, 'nonaktif']);
    Route::get('akun/aktif/{id}',[AkunController::class, 'aktif']);

    Route::get('kantor',[KantorController::class, 'index']);
    Route::get('kantor/create',[KantorController::class, 'create']);
    Route::post('kantor/create',[KantorController::class, 'store']);
    Route::get('kantor/delete/{id}',[KantorController::class, 'delete']);

    // Route::get('bidang',[BidangController::class, 'index']);
    // Route::get('bidang/create',[BidangController::class, 'create']);
    // Route::post('bidang/create',[BidangController::class, 'store']);
    // Route::get('bidang/delete/{id}',[BidangController::class, 'delete']);

    // Route::get('arsip',[ArsipController::class, 'index']);
    // Route::get('arsip/create', ArsipCreate::class);
    // Route::get('arsip/delete/{id}',[ArsipController::class, 'delete']);

    Route::get('data-pegawai', DataPegawaiPage::class);
    Route::get('nppd', NppdPage::class);
    Route::get('spt', SptPage::class);
    Route::get('sppd', SppdPage::class);
    Route::get('rincian-biaya/{id}', RincianBiayaPage::class);

    Route::get('logout',[RegisterUserController::class,'logout']);
});
