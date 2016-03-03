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
		$individual = DB::table('tblCustPrivateIndividual')
				->leftJoin('tblReasonIndividual', 'tblCustPrivateIndividual.strCustPrivIndivID', '=', 'tblReasonIndividual.strInactiveIndividualID')
				->select('tblCustPrivateIndividual.*', 'tblReasonIndividual.strInactiveIndividualID', 'tblReasonIndividual.strInactiveReason')
				->orderBy('created_at')
				->get();
		$company = DB::table('tblCustCompany')
				->leftJoin('tblReasonCompany', 'tblCustCompany.strCustCompanyID', '=', 'tblReasonCompany.strInactiveCompanyID')
				->select('tblCustCompany.*', 'tblReasonCompany.strInactiveCompanyID', 'tblReasonCompany.strInactiveReason')
				->orderBy('created_at')
				->get();
		$role = DB::table('tblEmployeeRole')
				->leftJoin('tblReasonRole', 'tblEmployeeRole.strEmpRoleID', '=', 'tblReasonRole.strInactiveRoleID')
				->select('tblEmployeeRole.*', 'tblReasonRole.strInactiveRoleID', 'tblReasonRole.strInactiveReason')
				->orderBy('created_at')
				->get();
		$employee = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->leftJoin('tblReasonEmployee', 'tblEmployee.strEmployeeID', '=', 'tblReasonEmployee.strInactiveEmployeeID')
            ->select('tblEmployee.*', 'tblEmployeeRole.strEmpRoleName', 'tblReasonEmployee.strInactiveEmployeeID', 'tblReasonEmployee.strInactiveReason')
            ->get();
		$category = Category::all();
		$segment = DB::table('tblGarmentSegment')
            ->join('tblGarmentCategory', 'tblGarmentSegment.strCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->leftJoin('tblReasonSegment', 'tblGarmentSegment.strGarmentSegmentID', '=', 'tblReasonSegment.strInactiveSegmentID')
            ->select('tblGarmentSegment.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblReasonSegment.strInactiveSegmentID', 'tblReasonSegment.strInactiveReason')
            ->get();
		$pattern = DB::table('tblDesignPattern')
            	->join('tblGarmentCategory', 'tblDesignPattern.strDesignCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
				->join('tblGarmentSegment', 'tblDesignPattern.strDesignSegmentName', '=', 'tblGarmentSegment.strGarmentSegmentID')
				->leftJoin('tblReasonDesignPattern', 'tblDesignPattern.strDesignPatternID', '=', 'tblReasonDesignPattern.strInactivePatternID')
				->select('tblDesignPattern.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblGarmentSegment.strGarmentSegmentName', 'tblReasonDesignPattern.strInactivePatternID', 'tblReasonDesignPattern.strInactiveReason')
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
		$fabricType = DB::table('tblFabricType')
				->leftJoin('tblReasonFabricType', 'tblFabricType.strFabricTypeID', '=', 'tblReasonFabricType.strInactiveFabricTypeID')
				->select('tblFabricType.*', 'tblReasonFabricType.strInactiveFabricTypeID', 'tblReasonFabricType.strInactiveReason')
				->orderBy('created_at')
				->get();
		$swatch = DB::table('tblSwatches')
            ->join('tblFabricType', 'tblSwatches.strSwatchFabricTypeName', '=', 'tblFabricType.strFabricTypeID')
            ->leftJoin('tblReasonSwatches', 'tblSwatches.strSwatchID', '=', 'tblReasonSwatches.strInactiveSwatchID')
            ->select('tblSwatches.*', 'tblFabricType.strFabricTypeName', 'tblReasonSwatches.strInactiveSwatchID', 'tblReasonSwatches.strInactiveReason')
            ->get();
		$thread = DB::table('tblMaterialThread')
				->leftJoin('tblReasonMaterialThread', 'tblMaterialThread.strMaterialThreadID', '=', 'tblReasonMaterialThread.strInactiveThreadID')
				->select('tblMaterialThread.*', 'tblReasonMaterialThread.strInactiveThreadID', 'tblReasonMaterialThread.strInactiveReason')
				->orderBy('created_at')
				->get();
		$needle = DB::table('tblMaterialNeedle')
				->leftJoin('tblReasonMaterialNeedle', 'tblMaterialNeedle.strMaterialNeedleID', '=', 'tblReasonMaterialNeedle.strInactiveNeedleID')
				->select('tblMaterialNeedle.*', 'tblReasonMaterialNeedle.strInactiveNeedleID', 'tblReasonMaterialNeedle.strInactiveReason')
				->orderBy('created_at')
				->get(); 
		$button = DB::table('tblMaterialButton')
				->leftJoin('tblReasonMaterialButton', 'tblMaterialButton.strMaterialButtonID', '=', 'tblReasonMaterialButton.strInactiveButtonID')
				->select('tblMaterialButton.*', 'tblReasonMaterialButton.strInactiveButtonID', 'tblReasonMaterialButton.strInactiveReason')
				->orderBy('created_at')
				->get();
		$zipper = DB::table('tblMaterialZipper')
				->leftJoin('tblReasonMaterialZipper', 'tblMaterialZipper.strMaterialZipperID', '=', 'tblReasonMaterialZipper.strInactiveZipperID')
				->select('tblMaterialZipper.*', 'tblReasonMaterialZipper.strInactiveZipperID', 'tblReasonMaterialZipper.strInactiveReason')
				->orderBy('created_at')
				->get(); 
		$hook = DB::table('tblMaterialHookAndEye')
				->leftJoin('tblReasonMaterialHookAndEye', 'tblMaterialHookAndEye.strMaterialHookID', '=', 'tblReasonMaterialHookAndEye.strInactiveHookID')
				->select('tblMaterialHookAndEye.*', 'tblReasonMaterialHookAndEye.strInactiveHookID', 'tblReasonMaterialHookAndEye.strInactiveReason')
				->orderBy('created_at')
				->get();
		$catalogue = DB::table('tblCatalogue')
				->join('tblGarmentCategory', 'tblCatalogue.strCatalogueCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
				->leftJoin('tblReasonCatalogue', 'tblCatalogue.strCatalogueID', '=', 'tblReasonCatalogue.strInactiveCatalogueID')
				->select('tblCatalogue.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblReasonCatalogue.strInactiveCatalogueID', 'tblReasonCatalogue.strInactiveReason')
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