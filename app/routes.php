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

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/customerIndividual', 'CustomerIndividualController@individual');
	Route::get('/customerCompany', 'CustomerCompanyController@company');
});

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/employee', 'EmployeeController@employee');	
	Route::get('/employeeRole', 'RoleController@roles');
});

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/garments', 'GarmentsController@category');
	Route::get('/garmentsDetails', 'GarmentsController@details');
	Route::get('/designPattern', 'DesignPatternController@pattern');
	Route::get('/measurements', 'MeasurementController@measurements');
});

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/fabricAndMaterialsFabricType', 'FabricAndMaterialsController@fabricType');
	Route::get('/fabricAndMaterialsSwatches', 'FabricAndMaterialsController@swatch');
	Route::get('/fabricAndMaterialsMaterials','FabricAndMaterialsController@materials');
});

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/catalogue', 'CatalogueController@catalogue');
});

Route::group(array('prefix' => 'utilities'), function () {
	Route::get('/inactiveData', 'UtilitiesController@inactive');
});
////////////////ROUTES FOR VIEWS////////////////GET ROUTES///////////////////////

Route::group(array('prefix' => 'transaction'), function () {
	Route::get('/walk', 'AdminWalkController@walk');
	Route::get('/online', 'AdminOnlineCustomerController@online');
	Route::get('/orderProgress', 'AdminOrderProgressController@orderProgress');
	Route::get('/materials', 'AdminMaterialsController@materials');
	Route::get('/billing', 'AdminBillingController@billing');
});

Route::get('/customerIndividual','IndiController@indi');
Route::get('/customerCompany','ComController@com');
Route::get('/chooseProduct','ProductController@products');

/////////////////////ROUTES FOR VALIDATION (AJAX)//////////////////////////////////////////////
Route::post('/checkEmployee', array('uses' => 'AjaxController@checkEmployeeInput'));







//////////////////////CRUD FOR CUSTOMER INDIVIDUAL//////////////////////
Route::post('/addCustPrivIndiv', array('uses' => 'CustomerIndividualController@addCustPrivIndiv'));
Route::post('/editCustPrivIndiv', array('uses' => 'CustomerIndividualController@editCustPrivIndiv'));
Route::post('/delCustPrivIndiv', array('uses' => 'CustomerIndividualController@delCustPrivIndiv'));
Route::post('/reactCustPrivIndiv', array('uses' => 'CustomerIndividualController@reactCustPrivIndiv'));
//////////////////////CRUD FOR CUSTOMER COMPANY//////////////////////
Route::post('/addCustCompany', array('uses' => 'CustomerCompanyController@addCustCompany'));
Route::post('/editCustCompany', array('uses' => 'CustomerCompanyController@editCustCompany'));
Route::post('/delCustCompany', array('uses' => 'CustomerCompanyController@delCustCompany'));
Route::post('/reactCustCompany', array('uses' => 'CustomerCompanyController@reactCustCompany'));
//////////////////////CRUD FOR EMPLOYEE//////////////////////
Route::post('/addEmployee', array('uses'=>'EmployeeController@addEmployee'));
Route::post('/editEmployee', array('uses'=>'EmployeeController@editEmployee'));
Route::post('/delEmployee', array('uses' => 'EmployeeController@delEmployee'));
Route::post('/reactEmployee', array('uses' => 'EmployeeController@reactEmployee'));
//////////////////////CRUD FOR ROLE//////////////////////
Route::post('/addRole', array('uses' =>'RoleController@addRole'));
Route::post('/editRole', array('uses' => 'RoleController@editRole'));
Route::post('/delRole', array('uses' => 'RoleController@delRole'));
Route::post('/reactRole', array('uses' => 'RoleController@reactRole'));
//////////////////////CRUD FOR GARMENT CATEGORY//////////////////////
Route::post('/addGarmentCategory', array('uses' => 'GarmentsController@addGarmentCategory'));
Route::post('/editGarmentCategory', array('uses' => 'GarmentsController@editGarmentCategory'));
Route::post('/delGarmentCategory', array('uses' => 'GarmentsController@delGarmentCategory'));
Route::post('/reactGarmentCategory', array('uses' => 'GarmentsController@reactGarmentCategory'));
//////////////////////CRUD FOR GARMENT SEGMENT//////////////////////
Route::post('/addGarmentSegment', array('uses' => 'GarmentsController@addGarmentSegment'));
Route::post('/editGarmentSegment', array('uses' => 'GarmentsController@editGarmentSegment'));
Route::post('/delGarmentSegment', array('uses' => 'GarmentsController@delGarmentSegment'));
Route::post('/reactGarmentSegment', array('uses' => 'GarmentsController@reactGarmentSegment'));
//////////////////////CRUD FOR MEASUREMENT DETAIL//////////////////////
Route::post('/addMeasurementDetail', array('uses' => 'MeasurementController@addDetail'));
Route::post('/editMeasurementDetail', array('uses' => 'MeasurementController@editDetail'));
Route::post('/delMeasurementDetail', array('uses' => 'MeasurementController@delDetail'));
Route::post('/reactMeasurementDetail', array('uses' => 'MeasurementController@reactDetail'));
//////////////////////CRUD FOR MEASUREMENT CATEGORY//////////////////////
Route::post('/addMeasurementCategory', array('uses' => 'MeasurementController@addCategory'));
Route::post('/editMeasurementCategory', array('uses' => 'MeasurementController@editCategory'));
Route::post('/delMeasurementCategory', array('uses' => 'MeasurementController@delCategory'));
Route::post('/reactMeasurementCategory', array('uses' => 'MeasurementController@reactCategory'));
//////////////////////CRUD FOR FABRIC TYPE//////////////////////
Route::post('/addFabricType', array('uses' => 'FabricAndMaterialsController@addFabricType'));
Route::post('/editFabricType', array('uses' => 'FabricAndMaterialsController@editFabricType'));
Route::post('/delFabricType', array('uses' => 'FabricAndMaterialsController@delFabricType'));
Route::post('/reactFabricType', array('uses' => 'FabricAndMaterialsController@reactFabricType'));
//////////////////////CRUD FOR DESIGN PATTERN//////////////////////
Route::post('/addDesignPattern', array('uses' => 'DesignPatternController@addPattern'));
Route::post('/editDesignPattern', array('uses' => 'DesignPatternController@editPattern'));
Route::post('/delDesignPattern', array('uses' => 'DesignPatternController@delPattern'));
Route::post('/reactDesignPattern', array('uses' => 'DesignPatternController@reactPattern'));
//////////////////////CRUD FOR CATALOGUE//////////////////////
Route::post('/addCatalogueDesign', array('uses' => 'CatalogueController@addCatalogue'));
Route::post('/editCatalogueDesign', array('uses' => 'CatalogueController@editCatalogue'));
Route::post('/delCatalogueDesign', array('uses' => 'CatalogueController@delCatalogue'));
Route::post('/reactCatalogueDesign', array('uses' => 'CatalogueController@reactCatalogue'));
//////////////////////CRUD FOR SWATCHES//////////////////////
Route::post('/addSwatch', array('uses' => 'FabricAndMaterialsController@addSwatch'));
Route::post('/editSwatch', array('uses' => 'FabricAndMaterialsController@editSwatch'));
Route::post('/delSwatch', array('uses' => 'FabricAndMaterialsController@delSwatch'));
Route::post('/reactSwatch', array('uses' => 'FabricAndMaterialsController@reactSwatch'));
//////////////////////CRUD FOR MATERIAL THREAD//////////////////////
Route::post('/addThread', array('uses' => 'FabricAndMaterialsController@addThread'));
Route::post('/editThread', array('uses' => 'FabricAndMaterialsController@editThread'));
Route::post('/delThread', array('uses' => 'FabricAndMaterialsController@delThread'));
Route::post('/reactThread', array('uses' => 'FabricAndMaterialsController@reactThread'));
//////////////////////CRUD FOR MATERIAL NEEDLE//////////////////////
Route::post('/addNeedle', array('uses' => 'FabricAndMaterialsController@addNeedle'));
Route::post('/editNeedle', array('uses' => 'FabricAndMaterialsController@editNeedle'));
Route::post('/delNeedle', array('uses' => 'FabricAndMaterialsController@delNeedle'));
Route::post('/reactNeedle', array('uses' => 'FabricAndMaterialsController@reactNeedle'));
//////////////////////CRUD FOR MATERIAL BUTTON//////////////////////
Route::post('/addButton', array('uses' => 'FabricAndMaterialsController@addButton'));
Route::post('/editButton', array('uses' => 'FabricAndMaterialsController@editButton'));
Route::post('/delButton', array('uses' => 'FabricAndMaterialsController@delButton'));
Route::post('/reactButton', array('uses' => 'FabricAndMaterialsController@reactButton'));
//////////////////////CRUD FOR MATERIAL ZIPPER//////////////////////
Route::post('/addZipper', array('uses' => 'FabricAndMaterialsController@addZipper'));
Route::post('/editZipper', array('uses' => 'FabricAndMaterialsController@editZipper'));
Route::post('/delZipper', array('uses' => 'FabricAndMaterialsController@delZipper'));
Route::post('/reactZipper', array('uses' => 'FabricAndMaterialsController@reactZipper'));
//////////////////////CRUD FOR MATERIAL HOOK AND EYE//////////////////////
Route::post('/addHook', array('uses' => 'FabricAndMaterialsController@addHook'));
Route::post('/editHook', array('uses' => 'FabricAndMaterialsController@editHook'));
Route::post('/delHook', array('uses' => 'FabricAndMaterialsController@delHook'));
Route::post('/reactHook', array('uses' => 'FabricAndMaterialsController@reactHook'));

