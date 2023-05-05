<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/visitors',[VisitorsController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/visitors', [VisitorsController::class, 'edit'])->name('visitors.edit');
    Route::patch('/visitors', [VisitorsController::class, 'update'])->name('visitors.update');
    Route::delete('/visitors', [VisitorsController::class, 'destroy'])->name('visitors.destroy');

});
Route::middleware('auth')->group(function () {
    Route::post('logout', [VisitorsController::class, 'destroy'])
    ->name('logout');
});    

Route::get('login', [VisitorsController::class, 'create'])
                    ->name('login');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/visitors', [VisitorsController::class, 'visitors']);
   

});