<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});

//
//Route::get('/empReg','EmployeeController@index');
//Route::get('/empReg/{id}','EmployeeController@show');
//Route::post('/empReg','EmployeeController@store')->name('create_emp');
//Route::post('/empReg/update/{id}','EmployeeController@update');
//Route::delete('/empReg/{id}','EmployeeController@destroy');