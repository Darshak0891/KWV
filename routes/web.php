<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeHouseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ImageController;
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

Auth::routes(['register' => false]);
Route::get('/', function () {
    return view('auth.login');
});

Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('is_admin');
Route::get('user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');


Route::group(['prefix' => 'employees', 'middleware' => ['is_admin']],  function () {
    Route::post('/status-change', [EmployeeController::class, 'status'])->name('status.change');
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('/{employee}/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
    Route::get('/back', [Controller::class, 'back'])->name('employees.back');
});

Route::group(['prefix' => 'societies', 'middleware' => ['is_admin']],  function () {
    Route::get('/', [SocietyController::class, 'index'])->name('societies.index');
    Route::get('/create', [SocietyController::class, 'create'])->name('societies.create');
    Route::post('/store', [SocietyController::class, 'store'])->name('societies.store');
    Route::get('/{society}/edit', [SocietyController::class, 'edit'])->name('societies.edit');
    Route::post('/{society}/update', [SocietyController::class, 'update'])->name('societies.update');
    Route::delete('/{society}/delete', [SocietyController::class, 'delete'])->name('societies.delete');
    Route::get('/file-import-export', [SocietyController::class, 'fileImportExport'])->name('societies.fileImportExport');
    Route::post('/file_import', [SocietyController::class, 'fileImport'])->name('societies.file_import');
});

Route::group(['prefix' => 'houses', 'middleware' => ['is_admin']],  function () {
    Route::get('/', [HouseController::class, 'index'])->name('houses.index');
    Route::get('/create', [HouseController::class, 'create'])->name('houses.create');
    Route::post('/store', [HouseController::class, 'store'])->name('houses.store');
    Route::get('/{house}/edit', [HouseController::class, 'edit'])->name('houses.edit');
    Route::post('/{house}/update', [HouseController::class, 'update'])->name('houses.update');
    Route::delete('/{house}/delete', [HouseController::class, 'delete'])->name('houses.delete');
    Route::get('/file-import-export', [HouseController::class, 'fileImportExport'])->name('houses.fileImportExport');
    Route::post('/file_import', [HouseController::class, 'fileImport'])->name('houses.file_import');
});

Route::group(['prefix' => 'adminlogs', 'middleware' => ['is_admin']], function () {
    Route::get('/', [EmployeeController::class, 'adminlog'])->name('adminlogs.index');
    Route::get('/{id}/show', [EmployeeController::class, 'showadminlog'])->name('adminlogs.show');
});

Route::group(['prefix' => 'employee_houses', 'middleware' => ['is_admin']], function () {
    Route::get('/', [EmployeeHouseController::class, 'index'])->name('employee_houses.index');
    Route::post('/fetch-society', [EmployeeHouseController::class, 'fetchSociety'])->name('employee_houses.fetchsociety');
    Route::get('/create', [EmployeeHouseController::class, 'create'])->name('employee_houses.create');
    Route::post('/store', [EmployeeHouseController::class, 'store'])->name('employee_houses.store');
    Route::get('/{id}/show', [EmployeeHouseController::class, 'show'])->name('employee_houses.show');
    Route::get('/{house}/show_house', [EmployeeHouseController::class, 'showHouse'])->name('employee_houses.show_house');
    Route::delete('/{id}/delete', [EmployeeHouseController::class, 'delete'])->name('employee_houses.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/allocatesocieties', [UserController::class, 'index'])->name('allocatesocieties.index');
    Route::get('/{id}/show', [UserController::class, 'show'])->name('allocatesocieties.show');
    Route::get('/{id}/actions', [UserController::class, 'action'])->name('allocatesocieties.actions');
    Route::post('/actionpost', [UserController::class, 'actionpost'])->name('allocatesocieties.actionpost');


    Route::get('/profile', [UserController::class, 'profile'])->name('profiles.index');
    Route::post('/profile-update', [UserController::class, 'profileUpdate'])->name('profiles.update');


    Route::get('/notification', [NotificationController::class, 'index'])->name('notifications.index');

    Route::get('/change-password', [UserController::class, 'changePassword'])->name('profiles.change-password');
    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('profiles.update-password');
});

Auth::routes();
