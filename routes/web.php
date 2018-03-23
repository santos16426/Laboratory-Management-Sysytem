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
Route::get('/admin','WebController@GetFiles');
Route::post('/login', 'WebController@logged');
Route::get('/doctors', 'WebController@doctors');
Route::get('/service', 'WebController@service');

Route::get('/getDoc','WebController@getDoctor');
Route::post('/upform', 'WebController@upform');
Route::post('/delform', 'WebController@delform');
Route::post('/resform', 'WebController@resform');
Route::post('/mewform', 'WebController@mewform');


Route::get('/getService','WebController@getService');
Route::post('/upservform', 'WebController@upservform');
Route::post('/delservform', 'WebController@delservform');
Route::post('/resdelform', 'WebController@resservform');
Route::post('/mewservform', 'WebController@mewservform');