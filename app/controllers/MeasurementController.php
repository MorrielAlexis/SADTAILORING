<?php

class MeasurementController extends BaseController{
	
	
	public function measurements()
	{	
		////////////////MEASUREMENT HEAD////////////////
		$ids = DB::table('tblMeasurementHeader')
			->select('strMeasurementID')
			->orderBy('created_at', 'desc')
			->orderBy('strMeasurementID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strMeasurementID;
		$categoryNewID = $this->smartCounter($ID);	

		$head = DB::table('tblMeasurementHeader AS a')
            ->leftJoin('tblGarmentCategory AS b', 'a.strCategoryName', '=', 'b.strGarmentCategoryID')
            ->leftJoin('tblGarmentSegment AS c', 'a.strSegmentName', '=', 'c.strGarmentSegmentID')
            ->leftJoin('tblMeasurementDetail AS d', 'a.strMeasurementName', '=', 'd.strMeasurementDetailID')
            ->select('a.*', 'b.strGarmentCategoryName','c.strGarmentSegmentName', 
            			DB::raw('group_concat(d.strMeasurementDetailName) AS meas_details'),
            			DB::raw('group_concat(a.strMeasurementName) AS meas_details_id'))
            ->orderBy('created_at')
            ->groupBy('a.strCategoryName')
            ->groupBy('a.strSegmentName')
            ->get();

        for($i = 0; $i < count($head); $i++)
        	$expHead[] = explode(",", $head[$i]->meas_details_id);

        $category =  Category::all(); 	
        $segment =  Segment::all(); 	
        $detailList =  MeasurementDetail::all(); 	 
		////////////////MEASUREMENT HEAD////////////////

		////////////////MEASUREMENT DETAILS////////////////
		$ids = DB::table('tblMeasurementDetail')
			->select('strMeasurementDetailID')
			->orderBy('created_at', 'desc')
			->orderBy('strMeasurementDetailID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strMeasurementDetailID;
		$detailNewID = $this->smartCounter($ID);			

		$detail = MeasurementDetail::all();
		////////////////MEASUREMENT DETAILS////////////////
		// dito magbabago
		return View::make('measurements') 
					->with('head', $head)
					->with('detail', $detail)
					->with('categoryNewID', $categoryNewID)
					->with('detailNewID', $detailNewID)
					->with('category', $category)
					->with('segment', $segment)
					->with('detailList', $detailList)
					->with('expHead', $expHead);
		
	}

	public function addDetail()
	{	
		$det = MeasurementDetail::all();
		$isAdded = FALSE;

		foreach ($det as $det)
			if(strcasecmp($det->strMeasurementDetailName, Input::get('addDetailName')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$detail = MeasurementDetail::create(array(
			'strMeasurementDetailID' => Input::get('addDetailID'),
			'strMeasurementDetailName' => Input::get('addDetailName'),
			'strMeasurementDetailDesc' => Input::get('addDetailDesc'),
			'boolIsActive' => 1
			));

			$detail->save();
			return Redirect::to('/maintenance/measurements?success=true');
		}else return Redirect::to('/maintenance/measurements?success=false');
	}

	public function addCategory()
	{	
		for($i = 0; $i < count(Input::get('addDetail')); $i++){

			if($i == 0){
				$category = MeasurementHead::create(array(
					'strMeasurementID' => Input::get('addMeasurementID'),
					'strCategoryName' => Input::get('addCategory'),
					'strSegmentName' => Input::get('addSegment'),
					'strMeasurementName' => Input::get('addDetail')[$i],
					'boolIsActive' => 1
				));

				$category->save();
			}else{
				$category = MeasurementHead::create(array(
					'strMeasurementID' => $categoryNewID,
					'strCategoryName' => Input::get('addCategory'),
					'strSegmentName' => Input::get('addSegment'),
					'strMeasurementName' => Input::get('addDetail')[$i],
					'boolIsActive' => 1
				));

				$category->save();
			}
				
			$ids = DB::table('tblMeasurementHeader')
			->select('strMeasurementID')
			->orderBy('created_at', 'desc')
			->orderBy('strMeasurementID', 'desc')
			->take(1)
			->get();

			$ID = $ids["0"]->strMeasurementID;
			$categoryNewID = $this->smartCounter($ID);	

		}
			
		return Redirect::to('/maintenance/measurements?success=false');
	}

	public function editDetail()
	{
		$id = Input::get('editDetailID');
		$detail = MeasurementDetail::find($id);

		$det = MeasurementDetail::all();
		$isAdded = FALSE;

		foreach ($det as $det)
			if(strcasecmp($det->strMeasurementDetailName, trim(Input::get('editDetailName'))) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$detail = MeasurementDetail::find($id);

			$detail->strMeasurementDetailName = Input::get('editDetailName');	
			$detail->strMeasurementDetailDesc = Input::get('editDetailDesc');

			$detail->save();
			return Redirect::to('/maintenance/measurements?successEdit=true');
	 	} else return Redirect::to('/maintenance/measurements?successEdit=false');
	}

	public function editCategory()
	{
		$id = Input::get('editMeasurementID');
		$isEdited = FALSE;

	if(!$isEdited){
		$category = MeasurementHead::find($id);

		$category->strCategoryName = Input::get('editCategory');	
		$category->strSegmentName= Input::get('editSegment');	
		$category->strMeasurementName = Input::get('editDetail');

		$category->save();
		return Redirect::to('/maintenance/measurements?successEdit=true');
	 } else return Redirect::to('/maintenance/measurements?successEdit=false');
	}

	public function delDetail()
	{
		$id = Input::get('delDetailID');
		$isDeleted = FALSE;

	if(!$isDeleted){
		$detail = MeasurementDetail::find($id);

		$count = DB::table('tblMeasurementHeader')
            ->join('tblMeasurementDetail', 'tblMeasurementHeader.strMeasurementName', '=', 'tblMeasurementDetail.strMeasurementDetailID')
            ->select('tblMeasurementDetail.*')
            ->where('tblMeasurementDetail.strMeasurementDetailID','=', $id)
            ->count();

        if($count == 0){
        	$detail->boolIsActive = 0;
        	$detail->save();
        	return Redirect::to('/maintenance/measurements?success=false');
        }else{
        	return Redirect::to('/maintenance/measurements?success=false');
        }
	
		return Redirect::to('/maintenance/measurements?successDel=true');
	 } else return Redirect::to('/maintenance/measurements?successDel=false');
	}

	public function delCategory()
	{
		$id = Input::get('delMeasurementID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$head = MeasurementHead::find($id);

		$head->boolIsActive = 0;

		$head->save();
		return Redirect::to('/maintenance/measurements?successDel=true');
	 } else return Redirect::to('/maintenance/measurements?successDel=false');
	}

	public function reactCategory()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$head = MeasurementHead::find($id);

		$head->boolIsActive = 1;

		$head->save();
		return Redirect::to('/maintenance/measurements?successRec=true');
	 } else return Redirect::to('/maintenance/measurements?successRec=false');
	}


	public function smartCounter($id)
	{	

		$lastID = str_split($id);

		$ctr = 0;
		$tempID = "";
		$tempNew = [];
		$newID = "";
		$add = TRUE;

		for($ctr = count($lastID)-1; $ctr >= 0; $ctr--){

			$tempID = $lastID[$ctr];

			if($add){
				if(is_numeric($tempID) || $tempID == '0'){
					if($tempID == '9'){
						$tempID = '0';
						$tempNew[$ctr] = $tempID;

					}else{
						$tempID = $tempID + 1;
						$tempNew[$ctr] = $tempID;
						$add = FALSE;
					}
				}else{
					$tempNew[$ctr] = $tempID;
				}			
			}
			$tempNew[$ctr] = $tempID;	
		}

		
		for($ctr = 0; $ctr < count($lastID); $ctr++){
			$newID = $newID . $tempNew[$ctr];
		}

		return $newID;
	}

}