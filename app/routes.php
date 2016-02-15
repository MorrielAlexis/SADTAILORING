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
Route::get('/designPattern', 'DesignPatternController@pattern');
Route::get('/measurements', 'MeasurementController@measurements');
Route::get('/fabricAndMaterialsFabricType', 'FabricAndMaterialsController@fabricType');
Route::get('/fabricAndMaterialsSwatches', 'FabricAndMaterialsController@swatch');
Route::get('/fabricAndMaterialsMaterials','FabricAndMaterialsController@materials');
Route::get('/catalogue', 'CatalogueController@catalogue');
////////////////ROUTES FOR VIEWS////////////////GET ROUTES///////////////////////

//////////////////////CRUD FOR CUSTOMER INDIVIDUAL//////////////////////
Route::post('/addCustPrivIndiv', array('uses' => 'CustomerController@addCustPrivIndiv'));
Route::post('/editCustPrivIndiv', array('uses' => 'CustomerController@editCustPrivIndiv'));
Route::post('/delCustPrivIndiv', array('uses' => 'CustomerController@delCustPrivIndiv'));
Route::post('/reactCustPrivIndiv', array('uses' => 'CustomerController@reactCustPrivIndiv'));
//////////////////////CRUD FOR CUSTOMER COMPANY//////////////////////
Route::post('/addCustCompany', array('uses' => 'CustomerController@addCustCompany'));
Route::post('/editCustCompany', array('uses' => 'CustomerController@editCustCompany'));
Route::post('/delCustCompany', array('uses' => 'CustomerController@delCustCompany'));
Route::post('/reactCustCompany', array('uses' => 'CustomerController@reactCustCompany'));
//////////////////////CRUD FOR EMPLOYEE//////////////////////
Route::post('/addEmployee', array('uses'=>'EmployeeController@addEmployee'));
Route::post('/editEmployee', array('uses'=>'EmployeeController@editEmployee'));
Route::post('/delEmployee', array('uses' => 'EmployeeController@delEmployee'));
Route::post('/reactEmployee', array('uses' => 'EmployeeController@reactEmployee'));
//////////////////////CRUD FOR ROLE//////////////////////
Route::post('/addRole', array('uses' =>'EmployeeController@addRole'));
Route::post('/editRole', array('uses' => 'EmployeeController@editRole'));
//////////////////////CRUD FOR GARMENT CATEGORY//////////////////////
Route::post('/addGarmentCategory', array('uses' => 'GarmentsController@addGarmentCategory'));
Route::post('/editGarmentCategory', array('uses' => 'GarmentsController@editGarmentCategory'));
//////////////////////CRUD FOR GARMENT SEGMENT//////////////////////
Route::post('/addGarmentSegment', array('uses' => 'GarmentsController@addGarmentSegment'));
Route::post('/editGarmentSegment', array('uses' => 'GarmentsController@editGarmentSegment'));
Route::post('/delGarmentSegment', array('uses' => 'GarmentsController@delGarmentSegment'));
Route::post('/reactGarmentSegment', array('uses' => 'GarmentsController@reactGarmentSegment'));
//////////////////////CRUD FOR MEASUREMENT DETAIL//////////////////////
Route::post('/addMeasurementDetail', array('uses' => 'MeasurementController@addDetail'));
Route::post('/editMeasurementDetail', array('uses' => 'MeasurementController@editDetail'));
//////////////////////CRUD FOR MEASUREMENT CATEGORY//////////////////////
Route::post('/addMeasurementCategory', array('uses' => 'MeasurementController@addCategory'));
Route::post('/editMeasurementCategory', array('uses' => 'MeasurementController@editCategory'));
Route::post('/delMeasurementCategory', array('uses' => 'MeasurementController@delCategory'));
//////////////////////CRUD FOR FABRIC TYPE//////////////////////
Route::post('/addFabricType', array('uses' => 'FabricAndMaterialsController@addFabricType'));
Route::post('/editFabricType', array('uses' => 'FabricAndMaterialsController@editFabricType'));
//////////////////////CRUD FOR DESIGN PATTERN//////////////////////
Route::post('/addDesignPattern', array('uses' => 'DesignPatternController@addPattern'));
Route::post('/editDesignPattern', array('uses' => 'DesignPatternController@editPattern'));
Route::post('/delDesignPattern', array('uses' => 'DesignPatternController@delPattern'));
Route::post('/reactDesignPattern', array('uses' => 'DesignPatternController@reactPattern'));
//////////////////////CRUD FOR CATALOGUE//////////////////////
Route::post('/addCatalogue', array('uses' => 'CatalogueController@addCatalogue'));
Route::post('/editCatalogue', array('uses' => 'CatalogueController@editCatalogue'));
//////////////////////CRUD FOR SWATCHES//////////////////////
Route::post('/addSwatch', array('uses' => 'FabricAndMaterialsController@addSwatch'));
Route::post('/editSwatch', array('uses' => 'FabricAndMaterialsController@editSwatch'));
Route::post('/delSwatch', array('uses' => 'FabricAndMaterialsController@delSwatch'));
Route::post('/reactSwatch', array('uses' => 'FabricAndMaterialsController@reactSwatch'));