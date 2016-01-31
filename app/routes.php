<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/customerIndividual', 'HomeController@individual');
	{

		return View::make('customerIndividual');
	}

//Route::get('/', function(){ return View::make('layouts/master'); });

/*
Route::get('/', function(){
	return View::make('forms/customerCompany');
});

//Route::get('/', function(){
	return View::make('forms/customerIndividual');
});
/*
Route::get('/', function(){
	return View::make('forms/employeeRole');
});

Route::get('/', function(){
	return View::make('forms/employee');
});

Route::get('/', function(){
	return View::make('forms/garments');
});

Route::get('/', function(){
	return View::make('forms/garmentsDetails');
});

Route::get('/', function(){
	return View::make('forms/measurementDetails');
});

Route::get('/', function(){
	return View::make('forms/measurementCategory');
});

Route::get('/', function(){
	return View::make('forms/fabricAndMaterialsFabricType');
});

Route::get('/', function(){
	return View::make('forms/fabricAndMaterialsSwatches');
});
*/
