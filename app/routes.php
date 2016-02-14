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

Route::get('/measurements', 'MeasurementController@measurements');

Route::get('/fabricAndMaterialsFabricType', 'FabricAndMaterialsController@fabricType');

Route::get('/fabricAndMaterialsSwatches', 'FabricAndMaterialsController@swatches');

Route::get('/fabricAndMaterialsMaterials','FabricAndMaterialsController@materials');

Route::get('/catalogue', 'CatalogueController@catalogue');

Route::post('/addEmployee', array('uses'=>'EmployeeController@addEmployee'));

Route::post('/editEmployee', array('uses'=>'EmployeeController@editEmployee'));

Route::post('/addRole', array('uses' =>'EmployeeController@addRole'));

Route::post('/editRole', array('uses' => 'EmployeeController@editRole'));

Route::post('/delEmployee', array('uses' => 'EmployeeController@delEmployee'));

Route::post('/reactEmployee', array('uses' => 'EmployeeController@reactEmployee'));

Route::post('/addGarmentCategory', array('uses' => 'GarmentsController@addGarmentCategory'));

Route::post('/editGarmentCategory', array('uses' => 'GarmentsController@editGarmentCategory'));

Route::post('/addGarmentSegment', array('uses' => 'GarmentsController@addGarmentSegment'));

Route::post('/editGarmentSegment', array('uses' => 'GarmentsController@editGarmentSegment'));

<<<<<<< HEAD
Route::post('/addCustPrivIndiv', array('uses' => 'CustomerController@addCustPrivIndiv'));
=======
Route::post('/delGarmentSegment', array('uses' => 'GarmentsController@delGarmentSegment'));

Route::post('/addMeasurementDetail', array('uses' => 'MeasurementController@addDetail'));

Route::post('/editMeasurementDetail', array('uses' => 'MeasurementController@editDetail'));

Route::post('/addMeasurementCategory', array('uses' => 'MeasurementController@addCategory'));

Route::post('/editMeasurementCategory', array('uses' => 'MeasurementController@editCategory'));

Route::post('/delMeasurementCategory', array('uses' => 'MeasurementController@delCategory'));

Route::post('/addCustPrivIndiv', array('uses' => 'GarmentsController@addCustPrivIndiv'));
>>>>>>> 105a192e96866117887fc9f7633af428d2187900

Route::post('/editCustPrivIndiv', array('uses' => 'CustomerController@editCustPrivIndiv'));

Route::post('/delCustPrivIndiv', array('uses' => 'CustomerController@delCustPrivIndiv'));

<<<<<<< HEAD
Route::post('/addCustCompany', array('uses' => 'CustomerController@addCustCompany'));

Route::post('/editCustCompany', array('uses' => 'CustomerController@editCustCompany'));

Route::post('/delCustCompany', array('uses' => 'CustomerController@delCustCompany'));
=======
Route::post('/editCustCompany', array('uses' => 'GarmentsController@editCustCompany'));

>>>>>>> 105a192e96866117887fc9f7633af428d2187900
