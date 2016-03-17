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
Route::get('/index', 'HomeController@remembLog');
Route::post('/login', array('uses'=>'HomeController@LogIn'));
Route::get('/logout', 'HomeController@LogOut');

Route::group(['before' => 'login'], function() {

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/customerIndividual', 'CustomerIndividualController@individual');
	Route::get('/customerCompany', 'CustomerCompanyController@company');
});

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/employee', 'EmployeeController@employee');	
	Route::get('/employeeRole', 'RoleController@roles');
});

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/garments', 'GarmentCategoryController@category');
	Route::get('/garmentsDetails', 'GarmentSegmentController@segment');
	Route::get('/designPattern', 'DesignPatternController@pattern');
	Route::get('/measurements', 'MeasurementController@measurements');
});

Route::group(array('prefix' => 'maintenance'), function () {
	Route::get('/fabricAndMaterialsFabricType', 'FabricController@fabricType');
	Route::get('/fabricAndMaterialsSwatches', 'SwatchController@swatch');
	Route::get('/fabricAndMaterialsMaterials','MaterialsController@materials');
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
});

Route::group(array('prefix' => 'transaction'), function() {
	Route::get('/adminBillingPayment', 'AdminBillingAndCollectionController@payment');
	Route::get('/adminBillingCollection', 'AdminBillingAndCollectionController@collection');
});


Route::get('/walkIndi','WalkIndiController@indi');
Route::get('/walkCom','WalkComController@com');
Route::get('/chooseProduct','ProductController@products');
Route::get('/alteration','AlterationController@alter');
Route::get('/madeOrder','OrderController@order');
Route::get('/trans','ChooseTransController@trans');
Route::get('/cart','CartController@cart');
Route::get('/orderMeasurement','OrderMeasurementController@order');



/////////////////////ROUTES FOR MADE TO ORDER//////////////////////////////////////////////////

Route::get('/orderCatalogue','OrderCatalogueController@catalogue');
Route::get('/orderPersonalize','OrderPersonalizeController@personalize');
Route::get('/orderUpload','OrderUploadController@uploads');





/////////////////////ROUTES FOR VALIDATION (AJAX)//////////////////////////////////////////////
Route::post('/checkEmployee', array('uses' => 'AjaxController@checkEmployeeInput'));



Route::post('/addJobOrder', array('uses' => 'OrderController@addJobOrder'));



//////////////////////CRUD FOR CUSTOMER INDIVIDUAL//////////////////////
Route::post('/addCustPrivIndiv', array('uses' => 'CustomerIndividualController@addCustPrivIndiv'));
Route::post('/editCustPrivIndiv', array('uses' => 'CustomerIndividualController@editCustPrivIndiv'));
Route::post('/delCustPrivIndiv', array('uses' => 'CustomerIndividualController@delCustPrivIndiv'));
Route::post('/reactCustPrivIndiv', array('uses' => 'CustomerIndividualController@reactCustPrivIndiv'));

Route::post('addWalkInIndiv', array('uses' => 'adminWalkController@addCustPrivIndiv'));
//////////////////////CRUD FOR CUSTOMER COMPANY//////////////////////
Route::post('/addCustCompany', array('uses' => 'CustomerCompanyController@addCustCompany'));
Route::post('/editCustCompany', array('uses' => 'CustomerCompanyController@editCustCompany'));
Route::post('/delCustCompany', array('uses' => 'CustomerCompanyController@delCustCompany'));
Route::post('/reactCustCompany', array('uses' => 'CustomerCompanyController@reactCustCompany'));

Route::post('/addWalkInCompany', array('uses' => 'adminWalkController@addCustCompany'));
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
Route::post('/addGarmentCategory', array('uses' => 'GarmentCategoryController@addGarmentCategory'));
Route::post('/editGarmentCategory', array('uses' => 'GarmentCategoryController@editGarmentCategory'));
Route::post('/delGarmentCategory', array('uses' => 'GarmentCategoryController@delGarmentCategory'));
Route::post('/reactGarmentCategory', array('uses' => 'GarmentCategoryController@reactGarmentCategory'));
//////////////////////CRUD FOR GARMENT SEGMENT//////////////////////
Route::post('/addGarmentSegment', array('uses' => 'GarmentSegmentController@addGarmentSegment'));
Route::post('/editGarmentSegment', array('uses' => 'GarmentSegmentController@editGarmentSegment'));
Route::post('/delGarmentSegment', array('uses' => 'GarmentSegmentController@delGarmentSegment'));
Route::post('/reactGarmentSegment', array('uses' => 'GarmentSegmentController@reactGarmentSegment'));
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
Route::post('/addFabricType', array('uses' => 'FabricController@addFabricType'));
Route::post('/editFabricType', array('uses' => 'FabricController@editFabricType'));
Route::post('/delFabricType', array('uses' => 'FabricController@delFabricType'));
Route::post('/reactFabricType', array('uses' => 'FabricController@reactFabricType'));
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
Route::post('/addSwatch', array('uses' => 'SwatchController@addSwatch'));
Route::post('/editSwatch', array('uses' => 'SwatchController@editSwatch'));
Route::post('/delSwatch', array('uses' => 'SwatchController@delSwatch'));
Route::post('/reactSwatch', array('uses' => 'SwatchController@reactSwatch'));
//////////////////////CRUD FOR MATERIAL THREAD//////////////////////
Route::post('/addThread', array('uses' => 'MaterialsController@addThread'));
Route::post('/editThread', array('uses' => 'MaterialsController@editThread'));
Route::post('/delThread', array('uses' => 'MaterialsController@delThread'));
Route::post('/reactThread', array('uses' => 'MaterialsController@reactThread'));
//////////////////////CRUD FOR MATERIAL NEEDLE//////////////////////
Route::post('/addNeedle', array('uses' => 'MaterialsController@addNeedle'));
Route::post('/editNeedle', array('uses' => 'MaterialsController@editNeedle'));
Route::post('/delNeedle', array('uses' => 'MaterialsController@delNeedle'));
Route::post('/reactNeedle', array('uses' => 'MaterialsController@reactNeedle'));
//////////////////////CRUD FOR MATERIAL BUTTON//////////////////////
Route::post('/addButton', array('uses' => 'MaterialsController@addButton'));
Route::post('/editButton', array('uses' => 'MaterialsController@editButton'));
Route::post('/delButton', array('uses' => 'MaterialsController@delButton'));
Route::post('/reactButton', array('uses' => 'MaterialsController@reactButton'));
//////////////////////CRUD FOR MATERIAL ZIPPER//////////////////////
Route::post('/addZipper', array('uses' => 'MaterialsController@addZipper'));
Route::post('/editZipper', array('uses' => 'MaterialsController@editZipper'));
Route::post('/delZipper', array('uses' => 'MaterialsController@delZipper'));
Route::post('/reactZipper', array('uses' => 'MaterialsController@reactZipper'));
//////////////////////CRUD FOR MATERIAL HOOK AND EYE//////////////////////
Route::post('/addHook', array('uses' => 'MaterialsController@addHook'));
Route::post('/editHook', array('uses' => 'MaterialsController@editHook'));
Route::post('/delHook', array('uses' => 'MaterialsController@delHook'));
Route::post('/reactHook', array('uses' => 'MaterialsController@reactHook'));
});
