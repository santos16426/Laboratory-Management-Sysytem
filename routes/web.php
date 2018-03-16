<?php

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
Route::get('/Website/Home','WebController@Website');
Route::post('/Website/PatientView','WebController@proceedPatientResult');
Route::post('/proceedPatientResult','WebController@login');
Route::get('/GetFiles','WebController@GetFiles');
Route::post('/changePassPatient','WebController@changepass');
Route::post('/Website/save_record','WebController@save');
Route::post('/login','WebController@GetFiles');