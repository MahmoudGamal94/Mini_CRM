<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Get Views
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/employee',[EmployeesController::class,'index'])->name('employee');
    Route::get('/company',[CompaniesController::class,'index'])->name('company');
    Route::get('/edit_employee/{id}',[EmployeesController::class,'edit']);
    Route::get('/edit_company/{id}',[CompaniesController::class,'edit']);

    // Employee Crud
    Route::get('/employee/{id}',[EmployeesController::class,'show']);
    Route::post('/employee',[EmployeesController::class,'store'])->name('add_emp');
    Route::post('/employee/update/{id}',[EmployeesController::class,'update']);
    Route::get('/employee/delete/{id}',[EmployeesController::class,'destroy']);

    // Company Crud
    Route::get('/company/{id}',[CompaniesController::class,'show']);
    Route::post('/company',[CompaniesController::class,'store'])->name('add_comp');
    Route::post('/company/update/{id}',[CompaniesController::class,'update']);
    Route::get('/company/delete/{id}',[CompaniesController::class,'destroy']);
});


//Route::get('/empReg','EmployeeController@index');
//Route::get('/empReg/{id}','EmployeeController@show');
//Route::post('/empReg','EmployeeController@store')->name('create_emp');
//Route::post('/empReg/update/{id}','EmployeeController@update');
//Route::delete('/empReg/{id}','EmployeeController@destroy');

//Route::get('/emp_register', function () {
//    return view('emp-register');
//})->name('emp-register');
//
//Route::get('/success', function () {
//    return view('success');
//})->name('success');
