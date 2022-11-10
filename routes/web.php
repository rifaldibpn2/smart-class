<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register ', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/home', [MainController::class, 'index'])->name('home');

});

// Kelas 
Route::prefix('/kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas');
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/edit/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::post('/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});


// Admin Routes
Route::prefix('/admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::prefix('/user')->group(function() {
            Route::get('/', [AdminController::class, 'index'])->name('admin.user');
            Route::post('/{id}', [AdminController::class, 'approve'])->name('user.approve');
            Route::post('/d/{id}', [AdminController::class, 'unapprove'])->name('user.unapprove');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
            Route::post('/edit/{id}', [AdminController::class, 'update'])->name('user.update');
        });
    });

Auth::routes();
