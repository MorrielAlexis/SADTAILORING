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

Route::get('/index', 'HomeController@goToMain');

Route::get('/', 'HomeController@showWelcome');

Route::get('/customerIndividual', 'CustomerController@individual');

Route::get('/customerCompany', 'CustomerController@company');

Route::get('/employee', 'EmployeeController@empProfile');	

Route::get('/employeeRole', 'EmployeeController@roles');

Route::get('/garments', 'GarmentsController@category');

Route::get('/garmentsDetails', 'GarmentsController@details');

Route::get('/designPattern', 'GarmentsController@designPattern');

Route::get('/measurementCategory', 'MeasurementController@category');

Route::get('/measurementDetails', 'MeasurementController@details');

Route::get('/fabricAndMaterialsFabricType', 'FabricAndMaterialsController@fabricType');

Route::get('/fabricAndMaterialsSwatches', 'FabricAndMaterialsController@swatches');

Route::get('/fabricAndMaterialsMaterials','FabricAndMaterialsController@materials');

Route::get('/catalogue', 'CatalogueController@catalogue');

Route::get('/measurements', 'GarmentsController@measurements');

Route::post('/addEmployee', array('uses'=>'EmployeeController@addEmployee'));

Route::post('/editEmployee', array('uses'=>'EmployeeController@editEmployee'));

Route::post('/addRole', array('uses' =>'EmployeeController@addRole'));

Route::post('/editRole', array('uses' => 'EmployeeController@editRole'));

Route::post('/delEmployee', array('uses' => 'EmployeeController@delEmployee'));

Route::post('/addGarmentCategory', array('uses' => 'GarmentsController@addGarmentCategory'));

Route::post('/editGarmentCategory', array('uses' => 'GarmentsController@editGarmentCategory'));

Route::post('/addGarmentSegment', array('uses' => 'GarmentsController@addGarmentSegment'));

Route::post('/editGarmentSegment', array('uses' => 'GarmentsController@editGarmentSegment'));

