<?php

use App\Http\Controllers\InvoiceController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('bill/admin', [InvoiceController::class, 'index'])->name('admin.index');
Route::post('bill/admin/store', [InvoiceController::class, 'store'])->name('admin.store');
Route::get('/bill/user/show', [InvoiceController::class, 'show'])->name('user.show');
Route::get('/buy', [InvoiceController::class, 'buy'])->name('user.buy');
Route::get('bill/user/search', [InvoiceController::class, 'search'])->name('user.search');
Route::get('/show', [InvoiceController::class, 'addshow']);


require __DIR__ . '/auth.php';
