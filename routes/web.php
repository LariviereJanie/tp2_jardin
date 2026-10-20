<?php
use App\Routes\Route;

Route::get('/', 'HomeController@index');
Route::get('/plantes', 'PlanteController@index');
Route::get('/plante/show', 'PlanteController@show');
Route::get('/plante/create', 'PlanteController@create');
Route::post('/plante/store', 'PlanteController@store');
Route::get('/plante/edit', 'PlanteController@edit');

Route::post('/plante/update', 'PlanteController@update');
Route::post('/plante/delete', 'PlanteController@delete');


Route::dispatch();