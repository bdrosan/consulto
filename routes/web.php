<?php

use App\Http\Controllers\FollowupController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

    Route::post('/lead/import', [LeadController::class, 'import'])->name('lead.import');
    Route::post('/lead/bulkAction', [LeadController::class, 'bulkAction'])->name('lead.bulkAction');
    Route::resource('/lead', LeadController::class);
    Route::get('/lead/livesearch/(:any)', [LeadController::class, 'liveSearch'])->name('lead.liveSearch');

    Route::resource('/follow-up', FollowupController::class);
    Route::get('/follow-up/{lead}/create', function ($lead) {
        return  view('followup.createByLead', ['lead' => $lead]);
    })->name('followup.createByLead');
    Route::get('/follow-up/lead/{lead}', [FollowupController::class, 'leadShow'])->name('followup.leadShow');


    Route::resource('/appointment', LeadController::class);
    Route::resource('/assessment', LeadController::class);
    Route::resource('/file-submit', LeadController::class);
    Route::resource('/payment', LeadController::class);
    Route::resource('/processing', LeadController::class);
    Route::resource('/archive', LeadController::class);
    Route::resource('/report', LeadController::class);

    Route::prefix('admin')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
    });
});

require __DIR__ . '/auth.php';