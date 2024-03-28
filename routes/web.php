<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, '_home'])
    ->name('landing')
;

Route::prefix('/admin')->middleware('auth:web')->group(function () {
    Route::get('/', [AdminController::class, 'home'])
        ->name('admin.home')
    ;

    Route::prefix('/users')->group(function () {
        Route::get('/', [AdminController::class, 'users'])
            ->name('admin.users')
        ;
        Route::delete('/{id}', [AdminController::class, 'usersDelete']);
    });

    Route::prefix('/currencies')->group(function () {
        Route::get('/', [AdminController::class, 'currencies'])
            ->name('admin.currencies')
        ;
        Route::delete('/{id}', [AdminController::class, 'currenciesDelete']);

        Route::prefix('/add')->group(function () {
            Route::get('/', [AdminController::class, 'currenciesAdd'])
                ->name('admin.currencies.add')
            ;
            Route::post('/', [AdminController::class, 'currenciesAddHandle']);
        });
    });
});

Route::get('/login', [AdminController::class, '_login'])
    ->name('login')
;
Route::post('/login', [AdminController::class, '_loginHandle']);

Route::get('/register', [AdminController::class, '_register'])
    ->name('register')
;
Route::post('/register', [AdminController::class, '_registerHandle']);

Route::get('/logout', [AdminController::class, '_logout']);


