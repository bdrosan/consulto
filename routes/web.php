<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileOpenController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Lead routes
    Route::get('/lead/livesearch/(:any)', [LeadController::class, 'liveSearch'])->name('lead.liveSearch');
    Route::post('/lead/import', [LeadController::class, 'import'])->name('lead.import');
    Route::post('/lead/bulkAction', [LeadController::class, 'bulkAction'])->name('lead.bulkAction');
    Route::patch('/lead/userUpdate/{lead}', [LeadController::class, 'userUpdate'])->name('lead.userUpdate');
    Route::patch('/lead/transfer/{lead}', [LeadController::class, 'transfer'])->name('lead.transfer');
    Route::get('/lead/search', [LeadController::class, 'search'])->name('lead.search');
    Route::get('/lead/{lead}/movetoarchive', function ($lead) {
        echo $lead;
    })->name('lead.moveToaAchive');
    Route::get('/lead/user/{user_id}', [LeadController::class, 'userLead'])->middleware('permission:access all leads')->name('lead.userlead');
    Route::get('/lead/unassigned', [LeadController::class, 'unassigned'])->middleware('permission:access all leads')->name('lead.unassigned');
    Route::get('/lead/unfollowed', [LeadController::class, 'unfollowed'])->middleware('permission:access all leads')->name('lead.unfollowed');
    Route::get('/lead/followed', [LeadController::class, 'followed'])->middleware('permission:access all leads')->name('lead.followed');
    Route::resource('/lead', LeadController::class);

    //Follow up routes
    Route::resource('follow-up', FollowupController::class);
    Route::prefix('follow-up')->group(function () {
        Route::get('lead/{lead}/create', function ($lead) {
            return  view('followup.createByLead', ['lead' => $lead]);
        })->name('follow-up.createByLead');
        Route::get('lead/{lead}/movetoarchive', [FollowupController::class, 'moveToArchive'])->name('follow-up.moveToArchive');
        Route::get('lead/{lead}/undoarchive', [FollowupController::class, 'undoArchive'])->name('follow-up.undoArchive');
        Route::patch('lead/transfer/{lead}', [FollowupController::class, 'transfer'])->name('follow-up.transfer');
        Route::get('lead/{lead}', [FollowupController::class, 'leadShow'])->name('follow-up.leadShow');
    });

    //Appointment routes
    Route::resource('appointment', AppointmentController::class);
    Route::prefix('appointment')->group(function () {
        Route::get('lead/{lead}', [AppointmentController::class, 'leadShow'])->name('appointment.leadShow');
        Route::get('lead/{lead}/create', [AppointmentController::class, 'createByLead'])->name('appointment.createByLead');
    });

    //File open routes
    Route::get('/file-open/create/lead/{lead}', [FileOpenController::class, 'createByLead'])->name('file-open.createByLead');
    Route::resource('/file-open', FileOpenController::class);

    Route::resource('/payment', LeadController::class)->middleware(['can:access payment']);
    Route::resource('/processing', LeadController::class);
    Route::resource('/archive', LeadController::class);
    Route::resource('/report', LeadController::class)->middleware(['can:access report']);

    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return redirect()->route('user.index');
        });
        Route::resource('user', UserController::class)->middleware(['can:access user']);
        Route::post('user/storeRole', [UserController::class, 'storeRole'])->name('user.storeRole')->middleware(['can:access user']);
        Route::resource('role', RoleController::class)->middleware(['can:access role']);
        Route::post('role/storePermission', [RoleController::class, 'storePermission'])->name('role.storePermission')->middleware(['can:access role']);
        Route::resource('permission', PermissionController::class)->middleware(['can:access permission']);
    });
});

require __DIR__ . '/auth.php';