<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeHouseController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::group(['prefix' => 'employees', 'middleware' => ['is_admin']],  function() {
    Route::post('/status-change',[EmployeeController::class,'status'])->name('status.change');
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('/{employee}/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
    
}); 

Route::group(['prefix' => 'societies', 'middleware' => ['is_admin']],  function() {
    Route::get('/', [SocietyController::class, 'index'])->name('societies.index');
    Route::get('/create', [SocietyController::class, 'create'])->name('societies.create');
    Route::post('/store', [SocietyController::class, 'store'])->name('societies.store');
    Route::get('/{society}/edit', [SocietyController::class, 'edit'])->name('societies.edit');
    Route::post('/{society}/update', [SocietyController::class, 'update'])->name('societies.update');
    Route::delete('/{society}/delete', [SocietyController::class, 'delete'])->name('societies.delete');
});

Route::group(['prefix' => 'houses', 'middleware' => ['is_admin']],  function() {
    Route::get('/', [HouseController::class, 'index'])->name('houses.index');
    Route::get('/create', [HouseController::class, 'create'])->name('houses.create');
    Route::post('/store', [HouseController::class, 'store'])->name('houses.store');
    Route::get('/{house}/edit', [HouseController::class, 'edit'])->name('houses.edit');
    Route::post('/{house}/update', [HouseController::class, 'update'])->name('houses.update');
    Route::delete('/{house}/delete', [HouseController::class, 'delete'])->name('houses.delete');
});

Route::group(['prefix' => 'adminlogs', 'middleware' => ['is_admin']],function(){
    Route::get('/', [EmployeeController::class, 'adminlog'])->name('adminlogs.index');
    Route::get('/{id}/show', [EmployeeController::class, 'showadminlog'])->name('adminlogs.show');    
});

Route::group(['prefix' => 'employee_houses', 'middleware' => ['is_admin']], function(){
    Route::get('/', [EmployeeHouseController::class, 'index'])->name('employee_houses.index');
    Route::post('/fetch-society',[EmployeeHouseController::class, 'fetchSociety'])->name('employee_houses.fetchsociety');
    Route::get('/create',[EmployeeHouseController::class, 'create'])->name('employee_houses.create');
    Route::post('/store',[EmployeeHouseController::class, 'store'])->name('employee_houses.store');
    Route::get('/{id}/show',[EmployeeHouseController::class, 'show'])->name('employee_houses.show');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
