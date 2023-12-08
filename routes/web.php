<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TasksController;

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
})->name('');
Route::get('/contact', function () {
    return view('profiles.contact');
})->name('contact');
Route::get('/services', function () {
    return view('profiles.services');
})->name('services');

Route::get('/create', [TasksController::class, 'index'])->name('create');
Route::post('/create', [TasksController::class, 'store'])->name('create.store');


Route::get('/profil', [SignController::class, 'index'])->name('index');
Route::get('/sign', [SignController::class, 'sign'])->name('sign');
Route::post('/profil', [SignController::class, 'store'])->name('profil.store');

Route::get('/profil', [LoginController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/profil', [LoginController::class, 'store'])->name('profil.store');
