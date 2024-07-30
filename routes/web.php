<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoucherTemplateController;

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

Route::get('/', function () {
    return view('CodeMirror');
});

Route::get('/voucher-templates', [VoucherTemplateController::class, 'index'])->name('voucher-templates.index');
Route::post('/voucher-templates', [VoucherTemplateController::class, 'store'])->name('voucher-templates.store');
Route::get('/voucher-templates/{id}/view', [VoucherTemplateController::class, 'view'])->name('voucher-templates.view');
Route::get('/voucher-templates/{id}/edit', [VoucherTemplateController::class, 'edit'])->name('voucher-templates.edit');
Route::post('/voucher-templates/{id}/edit', [VoucherTemplateController::class, 'update'])->name('voucher-templates.update');
Route::delete('/voucher-templates/{id}', [VoucherTemplateController::class, 'destroy'])->name('voucher-templates.destroy');