<?php

use App\Http\Controllers\AdminListingController;
use App\Http\Controllers\ProviderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getlistings', [AdminListingController::class,'getlistings'])->name('getlistings');
Route::get('get_impression_data', [ProviderController::class, 'get_impression_data'])->name('get_impression_data');
// Route::get('countimpression', [AdminListingController::class, 'countimpression'])->name('countimpression');

Route::get('showlistings', [AdminListingController::class,'showlistings'])->name('showlistings');
Route::get('recordimpression', [AdminListingController::class, 'recordimpression'])->name('recordimpression');

Route::get('showbasiclistings', [AdminListingController::class,'showBasicListings'])->name('showBasicListings');
Route::get('recordbasicimpression', [AdminListingController::class, 'recordbasicimpression'])->name('recordbasicimpression');
