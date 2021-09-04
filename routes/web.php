<?php

use App\Http\Controllers\FollowupController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 */

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/lead', LeadController::class);
    Route::resource('/follow-up', FollowupController::class);
    Route::resource('/appointment', LeadController::class);
    Route::resource('/assessment', LeadController::class);
    Route::resource('/file-submit', LeadController::class);
    Route::resource('/payment', LeadController::class);
    Route::resource('/processing', LeadController::class);
    Route::resource('/archive', LeadController::class);
    Route::resource('/report', LeadController::class);
});

require __DIR__ . '/auth.php';
