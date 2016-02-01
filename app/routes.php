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

Route::get('/customerIndividual', 'CustomerController@individual');

Route::get('/customerCompany', 'CustomerController@company');

Route::get('/employee', 'EmployeeController@empProfile');	

Route::get('/employeeRole', 'EmployeeController@roles');

<<<<<<< HEAD
Route::get('/garments', 'GarmentsController@category');
=======
//Route::get('/', function(){ return View::make('buttonDetails'); });
>>>>>>> a1cbde6587abd2fdeb76dd834959cb227f2fcd64

Route::get('/garmentsDetails', 'GarmentsController@details');

Route::get('/designPattern', 'GarmentsController@designPattern');

Route::get('/measurementCategory', 'MeasurementController@category');

Route::get('/measurementDetails', 'MeasurementController@details');

Route::get('/fabricAndMaterialsFabricType', 'fabricAndMaterialsController@fabricType');

Route::get('/fabricAndMaterialsFabricType', 'fabricAndMaterialsController@swatches');

Route::get('/catalogue', 'CatalogueController@catalogue');
