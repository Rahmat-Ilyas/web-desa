<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

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

Route::get('/', [LandingController::class, 'home']);
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LandingController::class, 'home'])->name('admin.home');

    Route::post('/config', [LandingController::class, 'config']);
    Route::get('/config/datatable', [LandingController::class, 'datatable']);
    Route::post('/store/{target}', [LandingController::class, 'store']);
    Route::post('/update/{target}', [LandingController::class, 'update']);
    Route::get('/delete/{target}/{id}', [LandingController::class, 'delete']);

    Route::get('/{page}', [LandingController::class, 'page']);
    Route::get('/{dir}/{page}', [LandingController::class, 'pagedir']);
});
