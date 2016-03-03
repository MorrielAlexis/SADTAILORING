<?php

class UtilitiesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function inactive()
	{	
		$individual = PrivateIndividual::all();
		$company = Company::all();
		$role = Role::all();
		$employee = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->select('tblEmployee.*', 'tblEmployeeRole.strEmpRoleName')
            ->get();
		$category = Category::all();
		$segment = DB::table('tblGarmentSegment')
            ->join('tblGarmentCategory', 'tblGarmentSegment.strCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->select('tblGarmentSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
            ->get();
		$pattern = DB::table('tblDesignPattern')
	    	->join('tblGarmentCategory', 'tblDesignPattern.strDesignCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
			->join('tblGarmentSegment', 'tblDesignPattern.strDesignSegmentName', '=', 'tblGarmentSegment.strGarmentSegmentID')
			->select('tblDesignPattern.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblGarmentSegment.strGarmentSegmentName')
			->orderBy('strDesignPatternID')
			->get();
		$head = DB::table('tblMeasurementHeader AS a')
            ->leftJoin('tblGarmentCategory AS b', 'a.strCategoryName', '=', 'b.strGarmentCategoryID')
            ->leftJoin('tblGarmentSegment AS c', 'a.strSegmentName', '=', 'c.strGarmentSegmentID')
            ->leftJoin('tblMeasurementDetail AS d', 'a.strMeasurementName', '=', 'd.strMeasurementDetailID')
            ->leftJoin('tblReasonMeasurementCategory AS e', 'a.strMeasurementID', '=', 'e.strInactiveHeadID')
            ->select('a.*', 'b.strGarmentCategoryName','c.strGarmentSegmentName', 
            			DB::raw('group_concat(d.strMeasurementDetailName) AS meas_details'),
            			DB::raw('group_concat(a.strMeasurementName) AS meas_details_id'),
            			'e.strInactiveHeadID', 'e.strInactiveReason')
            ->orderBy('created_at') 
            ->groupBy('a.strCategoryName')
            ->groupBy('a.strSegmentName')
            ->get();
        	
		$detail = DB::table('tblMeasurementDetail')
				->leftJoin('tblReasonMeasurementDetail', 'tblMeasurementDetail.strMeasurementDetailID', '=', 'tblReasonMeasurementDetail.strInactiveDetailID')
				->select('tblMeasurementDetail.*', 'tblReasonMeasurementDetail.strInactiveDetailID', 'tblReasonMeasurementDetail.strInactiveReason')
				->orderBy('created_at')
				->get();		
		$fabricType = FabricType::all();
		$swatch = DB::table('tblSwatches')
            ->join('tblFabricType', 'tblSwatches.strSwatchFabricTypeName', '=', 'tblFabricType.strFabricTypeID')
            ->select('tblSwatches.*', 'tblFabricType.strFabricTypeName')
            ->get();
		$thread =  MaterialThread::all();
		$needle =  MaterialNeedle::all(); 
		$button =  MaterialButton::all(); 
		$zipper =  MaterialZipper::all(); 
		$hook =  MaterialHookAndEye::all();
		$catalogue = DB::table('tblCatalogue')
				->join('tblGarmentCategory', 'tblCatalogue.strCatalogueCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
				->select('tblCatalogue.*', 'tblGarmentCategory.strGarmentCategoryName')
				->orderBy('created_at')
				->get();            

		return View::make('inactiveData')
					->with('individual', $individual)
					->with('company', $company)
					->with('role', $role)
					->with('employee', $employee)
					->with('category', $category)
					->with('segment', $segment)
					->with('pattern', $pattern)
					->with('head', $head)
					->with('detail', $detail)
					->with('fabricType', $fabricType)
					->with('swatch', $swatch)
					->with('thread', $thread)
					->with('needle', $needle)
					->with('button', $button)
					->with('zipper', $zipper)
					->with('hook', $hook)
					->with('catalogue', $catalogue);
	}

}