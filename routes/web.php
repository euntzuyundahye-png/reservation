<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\User\UserIndexController;
use App\Http\Controllers\Admin\Role\RoleIndexController;
use App\Http\Controllers\Admin\Permission\PermissionIndexController;
use App\Http\Controllers\Admin\Barang\BarangIndexController;
use App\Http\Controllers\Admin\Kasir\PenjualanController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| LOGIN ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.process');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| AUTH GROUP
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | WELCOME
    |--------------------------------------------------------------------------
    */
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/admin', [AdminIndexController::class, 'index'])
        ->name('admin.index');


    /*
    |--------------------------------------------------------------------------
    | USER ROUTE (ADMIN CONTROL DI CONTROLLER)
    |--------------------------------------------------------------------------
    */
    Route::prefix('/admin/user')->group(function () {
        Route::get('/', [UserIndexController::class, 'index'])->name('user.index');
        Route::get('/tambah', [UserIndexController::class, 'create'])->name('user.create');
        Route::post('/store', [UserIndexController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserIndexController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserIndexController::class, 'update'])->name('user.update');
        Route::delete('/delete/{id}', [UserIndexController::class, 'destroy'])->name('user.delete');
    });


    /*
    |--------------------------------------------------------------------------
    | ROLE ROUTE
    |--------------------------------------------------------------------------
    */
    Route::prefix('/admin/role')->group(function () {
        Route::get('/', [RoleIndexController::class,'index'])->name('role.index');
        Route::get('/tambah', [RoleIndexController::class,'create'])->name('role.create');
        Route::post('/store', [RoleIndexController::class,'store'])->name('role.store');
        Route::get('/edit/{id}', [RoleIndexController::class,'edit'])->name('role.edit');
        Route::post('/update/{id}', [RoleIndexController::class,'update'])->name('role.update');
        Route::delete('/delete/{id}', [RoleIndexController::class,'destroy'])->name('role.delete');
    });


    /*
    |--------------------------------------------------------------------------
    | PERMISSION ROUTE
    |--------------------------------------------------------------------------
    */
    Route::prefix('/admin/permission')->group(function () {
        Route::get('/', [PermissionIndexController::class,'index'])->name('permission.index');
        Route::get('/tambah', [PermissionIndexController::class,'create'])->name('permission.create');
        Route::post('/store', [PermissionIndexController::class,'store'])->name('permission.store');
        Route::get('/edit/{id}', [PermissionIndexController::class,'edit'])->name('permission.edit');
        Route::post('/update/{id}', [PermissionIndexController::class,'update'])->name('permission.update');
        Route::delete('/delete/{id}', [PermissionIndexController::class,'destroy'])->name('permission.delete');
    });


    /*
    |--------------------------------------------------------------------------
    | BARANG ROUTE (KARYAWAN CONTROL DI CONTROLLER)
    |--------------------------------------------------------------------------
    */
    Route::prefix('/admin/barang')->group(function () {
        Route::get('/', [BarangIndexController::class, 'index'])->name('barang.index');
        Route::get('/tambah', [BarangIndexController::class, 'create'])->name('barang.create');
        Route::post('/store', [BarangIndexController::class, 'store'])->name('barang.store');
        Route::get('/edit/{id}', [BarangIndexController::class, 'edit'])->name('barang.edit');
        Route::post('/update/{id}', [BarangIndexController::class, 'update'])->name('barang.update');
        Route::delete('/delete/{id}', [BarangIndexController::class, 'destroy'])->name('barang.delete');
    });

    /*
|--------------------------------------------------------------------------
| KASIR ROUTE (PENJUALAN)
|--------------------------------------------------------------------------
*/
Route::prefix('/admin/kasir')->group(function () {

    Route::get('/', [PenjualanController::class, 'index'])->name('kasir.index');

    Route::get('/tambah', [PenjualanController::class, 'create'])->name('kasir.create');

    Route::post('/store', [PenjualanController::class, 'store'])->name('kasir.store');

    Route::get('/edit/{id}', [PenjualanController::class, 'edit'])->name('kasir.edit');

    Route::put('/update/{id}', [PenjualanController::class, 'update'])->name('kasir.update');

    Route::delete('/delete/{id}', [PenjualanController::class, 'destroy'])->name('kasir.delete');

});

});