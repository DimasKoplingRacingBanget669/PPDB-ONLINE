<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/', [LoginController::class, 'Index']);
Route::post('/Login/Proses-Login', [LoginController::class, '_HandleLogin'])->name('Proses-Login');
Route::post('/Register/Proses-Register', [LoginController::class, '_HandleRegister'])->name('Proses-Register');

Route::get('/Login', function () {
    return view('Login');
})->name('Login');

Route::get('/Register', function () {
    return view('Register');
})->name('Register');


Route::middleware(['auth'])->group(function () {
    Route::post('/User-Home/Proses-Update', [UserController::class, '_UpdateNISN'])->name('Update-NISN');
    Route::post('/User-Home/Proses-Upload', [UserController::class, '_UploadData'])->name('Upload-Data');
    Route::post('/User-Home/Proses-Foto', [UserController::class, '_UploadFoto'])->name('Upload-Foto');
    Route::post('/User-Home/Proses-Upload-Lampiran', [UserController::class, '_UploadLampiran'])->name('Upload-Lampiran');
    Route::get('/User-Home', [UserController::class, 'index'])->name('User-Home');
    Route::get('/User-Lampirkan', [UserController::class, 'LampirkanBerkas'])->name('User-Lampirkan');
    Route::get('/Log-Out', [LoginController::class, '_HandleLogOut'])->name('Log-Out');
});
