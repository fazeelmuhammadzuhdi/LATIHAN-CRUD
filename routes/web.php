<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'home']);
Route::get('/register', [SiteController::class, 'register']);
Route::post('/postregister', [SiteController::class, 'postregister']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::post('/siswa/update/{id}', [SiswaController::class, 'update']);
    Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete']);
    Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile']);
    Route::post('/siswa/addnilai/{id}', [SiswaController::class, 'addnilai']);
    Route::get('/siswa/deletenilai/{id}/{idmapel}', [SiswaController::class, 'deletenilai']);
    Route::get('/siswa/exportpdf', [SiswaController::class, 'exportpdf']);
    Route::get('/guru/profile/{id}', [GuruController::class, 'profile']);
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
