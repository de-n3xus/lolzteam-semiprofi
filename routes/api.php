<?php

use App\Http\Controllers\Api\AssetsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/assets')->group(function () {
    Route::get('/', [AssetsController::class, 'getAssets']);
});
