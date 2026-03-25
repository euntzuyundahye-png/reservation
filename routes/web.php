<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\User\UserIndexController;
use App\Http\Controllers\Admin\Role\RoleIndexController;
use App\Http\Controllers\Admin\Permission\PermissionIndexController;
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
| WELCOME PAGE (SETELAH LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminIndexController::class, 'index'])
    ->middleware('auth')
    ->name('admin.index');


/*
|--------------------------------------------------------------------------
| USER ROUTE
|--------------------------------------------------------------------------
*/

Route::prefix('/admin/user')->middleware('auth')->group(function () {

    Route::get('/', [UserIndexController::class, 'index'])
        ->name('user.index');

    Route::get('/tambah', [UserIndexController::class, 'create'])
        ->name('user.create');

    Route::post('/store', [UserIndexController::class, 'store'])
        ->name('user.store');

    Route::get('/edit/{id}', [UserIndexController::class, 'edit'])
        ->name('user.edit');

    Route::post('/update/{id}', [UserIndexController::class, 'update'])
        ->name('user.update');

    Route::delete('/delete/{id}', [UserIndexController::class, 'destroy'])
        ->name('user.delete');

});


/*
|--------------------------------------------------------------------------
| ROLE ROUTE
|--------------------------------------------------------------------------
*/

Route::prefix('/admin/role')->middleware('auth')->group(function () {

    Route::get('/', [RoleIndexController::class,'index'])
        ->name('role.index');

    Route::get('/tambah', [RoleIndexController::class,'create'])
        ->name('role.create');

    Route::post('/store', [RoleIndexController::class,'store'])
        ->name('role.store');

    Route::get('/edit/{id}', [RoleIndexController::class,'edit'])
        ->name('role.edit');

    Route::post('/update/{id}', [RoleIndexController::class,'update'])
        ->name('role.update');

    Route::delete('/delete/{id}', [RoleIndexController::class,'destroy'])
        ->name('role.delete');

});


/*
|--------------------------------------------------------------------------
| PERMISSION ROUTE
|--------------------------------------------------------------------------
*/

Route::prefix('/admin/permission')->middleware('auth')->group(function () {

    Route::get('/', [PermissionIndexController::class,'index'])
        ->name('permission.index');

    Route::get('/tambah', [PermissionIndexController::class,'create'])
        ->name('permission.create');

    Route::post('/store', [PermissionIndexController::class,'store'])
        ->name('permission.store');

    Route::get('/edit/{id}', [PermissionIndexController::class,'edit'])
        ->name('permission.edit');

    Route::post('/update/{id}', [PermissionIndexController::class,'update'])
        ->name('permission.update');

    Route::delete('/delete/{id}', [PermissionIndexController::class,'destroy'])
        ->name('permission.delete');

});