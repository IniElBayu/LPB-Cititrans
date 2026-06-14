<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/


// ==========================================================
// PUBLIC AREA
// ==========================================================

// HOME
Route::get('/', [ReportController::class, 'home'])
    ->name('home');

// PRINT
Route::get('/laporan/{id}/print', [ReportController::class, 'print'])
    ->name('report.print');

// LANGUAGE
Route::get('/lang/{locale}', [LanguageController::class, 'switchLang'])
    ->name('lang.switch');


// ==========================================================
// AUTH
// ==========================================================

// LOGIN
Route::get('/login', function () {

    return view('login.index');

})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');


// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.post');


// ==========================================================
// PUBLIC REPORT
// ==========================================================

Route::post('/report/store', [ReportController::class, 'store'])
    ->name('report.store');

Route::get('/input_g', [ReportController::class, 'create'])
    ->name('input_g');


// ==========================================================
// PROTECTED AREA
// ==========================================================

Route::middleware(['auth'])->group(function () {

    // ======================================================
    // ADMIN DASHBOARD
    // ======================================================

    Route::get('/admin', [AuthController::class, 'dashboard'])
        ->name('admin.index');

    Route::get('/admin/home', [AuthController::class, 'dashboard'])
        ->name('admin.home');

    Route::get('/admin/input', function () {

        return view('admin.input');

    })->name('admin.input');


    // ======================================================
    // REPORT MANAGEMENT
    // ======================================================

    Route::get('/report/list', [ReportController::class, 'list'])
        ->name('report.list');

    Route::get('/admin/list', [ReportController::class, 'adminList'])
        ->name('report.adminList');

    Route::get('/reports/{id}/edit', [ReportController::class, 'edit'])
        ->name('reports.edit');
        

    Route::put('/reports/{id}', [ReportController::class, 'update'])
        ->name('reports.update');

    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])
        ->name('reports.destroy');

    Route::delete('/reports/{id}/delete-logs', [ReportController::class, 'deleteLogs'])
        ->name('reports.deleteLogs');

    Route::post('/reports/{id}/status', [ReportController::class, 'updateStatus'])
        ->name('reports.updateStatus');


    // ======================================================
    // USER MANAGEMENT
    // ======================================================

    Route::get('/admin/users', [UserController::class, 'userList'])
        ->name('admin.users');

    Route::get('/admin/users/create', [AuthController::class, 'userCreate'])
        ->name('admin.users_create');

    Route::post('/admin/users', [AuthController::class, 'userStore'])
        ->name('admin.users.store');

    Route::get('/admin/users/edit/{id}', [AuthController::class, 'userEdit'])
        ->name('admin.users.edit');

    Route::put('/admin/users/update/{id}', [AuthController::class, 'userUpdate'])
        ->name('admin.users.update');

    Route::delete('/admin/users/delete/{id}', [AuthController::class, 'userDelete'])
        ->name('admin.users.delete');

    Route::get('/admin/last-online', [UserController::class, 'lastOnline'])
        ->name('admin.last_online');


    // ======================================================
    // PETUGAS GENERAL
    // ======================================================

    Route::get('/staff', [ReportController::class, 'staffIndex'])
        ->name('staff.index_general');

    Route::get('/staff/list', [ReportController::class, 'staffList'])
        ->name('staff.list');
   
    // SESUDAH — tambahkan ->name()
Route::get('/laporan/{id}/pdf', [LaporanController::class, 'downloadPdf'])
    ->name('laporan.pdf');
// ======================================================
// PETUGAS AREA
// ======================================================

Route::prefix('staff')
    ->name('staff.')
    ->middleware(['role:staff'])
    ->group(function () {

        // index
        Route::get('/index', [PetugasController::class, 'index'])
            ->name('index');

        // LIST
        Route::get('/list', [PetugasController::class, 'list'])
            ->name('list');

        // CREATE
        Route::get('/create', [PetugasController::class, 'create'])
            ->name('create');

        // STORE
        Route::post('/store', [PetugasController::class, 'store'])
            ->name('store');

        // EDIT
        Route::get('/edit/{id}', [PetugasController::class, 'edit'])
            ->name('edit');

        // UPDATE
        Route::put('/update/{id}', [PetugasController::class, 'update'])
            ->name('update');

        // DELETE
        Route::delete('/destroy/{id}', [PetugasController::class, 'destroy'])
            ->name('destroy');

});



    // ======================================================
    // MANAGEMENT
    // ======================================================

    Route::get('/management/list', [ReportController::class, 'managementList'])
        ->name('management.list');

    Route::get('/management/users', [AuthController::class, 'managementUserList'])
        ->name('management.users');

    Route::post('/management/users/approve/{id}', [AuthController::class, 'approveUser'])
        ->name('management.user.approve');

    Route::delete('/management/users/reject/{id}', [AuthController::class, 'userDelete'])
        ->name('management.user.reject');


    // ======================================================
    // PROFILE
    // ======================================================

    Route::prefix('profile')->group(function () {

        Route::get('/', function () {

            return view('profile.index');

        })->name('profile.index');

        Route::get('/admin', function () {

            return view('profile.indexA');

       })->name('profile.indexA');


        Route::get('/user', function () {

            return view('profile.indexU');

        })->name('profile.indexU');


        Route::patch('/admin-update', [ProfileController::class, 'updateProfile'])
            ->name('profile.updateA');

        Route::patch('/update', [ProfileController::class, 'updateProfile'])
            ->name('profile.update');

        Route::patch('/update-photo', [ProfileController::class, 'updatePhoto'])
            ->name('profile.update.photo');

    });


    // ======================================================
    // LOGOUT
    // ======================================================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});