<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PermissionController;
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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
});

Route::middleware(['auth', 'role:admin|manager'])->group(function () {
    Route::post('/lead/import', [LeadController::class, 'import'])->name('lead.import');
    Route::post('/lead/bulkAction', [LeadController::class, 'bulkAction'])->name('lead.bulkAction');
    Route::resource('/lead', LeadController::class);
    Route::resource('/report', LeadController::class);
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'role:super admin|admin']
    ],
    function () {
        Route::get('/', function () {
            return redirect()->route('user.index');
        });
        Route::resource('user', UserController::class);
        Route::post('user/storeRole', [UserController::class, 'storeRole'])->name('user.storeRole');
        Route::resource('role', RoleController::class);
        Route::post('role/storePermission', [RoleController::class, 'storePermission'])->name('role.storePermission');
        Route::resource('permission', PermissionController::class);
    }
);

/* Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::post('user/storeRole', [UserController::class, 'storeRole'])->name('user.storeRole');
    Route::resource('role', RoleController::class);
    Route::post('role/storePermission', [RoleController::class, 'storePermission'])->name('role.storePermission');
    Route::resource('permission', PermissionController::class);
}); */

require __DIR__ . '/auth.php';