<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsmaaController;

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
    return view('welcome');
});
Route::get('/asmaa', [AsmaaController::class, 'create'])->name('create');
Route::post('/asmaa', [AsmaaController::class, 'store'])->name('asmaa.store');




