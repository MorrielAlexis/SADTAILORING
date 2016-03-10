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

		$records = MeasurementHead::all();
		$array = array();

		foreach ($records as $record) {
			if (count($array) == 0) {
				$item1 = array();
				$item1[0] = $record->strCategoryName;
				$item1[1] = $record->strSegmentName;
				$item1[2] = [$record->strMeasurementName];
				array_push($array, $item1);
				continue;
			}

			$doesExist = FALSE;
			foreach ($array as $checker) {
				if ($checker[0] == $record->strCategoryName && $checker[1] == $record->strSegmentName) {
					$doesExist = TRUE;
					break;
				}
			}

			if (!$doesExist) {
				$itemPush = array();
				$itemPush[0] = $record->strCategoryName;
				$itemPush[1] = $record->strSegmentName;
				$itemPush[2] = [$record->strMeasurementName];
				array_push($array, $itemPush);
				continue;
			}

			for ($i = 0; $i < count($array); $i++) {
				if ($array[$i][0] == $record->strCategoryName && $array[$i][1] == $record->strSegmentName) {
					array_push($array[$i][2], $record->strMeasurementName);
				}
			}
		}

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

        for($i = 0; $i < count($head); $i++)
        	$expHead[] = explode(",", $head[$i]->meas_details_id);

        $category =  Category::all(); 	
        $segment =  Segment::all(); 	
        $detailList =  MeasurementDetail::all();
        $reasonHead = ReasonMeasurementCategory::all();	 
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
		$reasonDetail = ReasonMeasurementDetail::all();

		$detail = DB::table('tblMeasurementDetail')
				->leftJoin('tblReasonMeasurementDetail', 'tblMeasurementDetail.strMeasurementDetailID', '=', 'tblReasonMeasurementDetail.strInactiveDetailID')
				->select('tblMeasurementDetail.*', 'tblReasonMeasurementDetail.strInactiveDetailID', 'tblReasonMeasurementDetail.strInactiveReason')
				->orderBy('created_at')
				->get();
		////////////////MEASUREMENT DETAILS////////////////
		// dito magbabago
		return View::make('measurements') 
					->with('head', $head)
					->with('detail', $detail)
					->with('reasonDetail', $reasonDetail)
					->with('reasonHead', $reasonHead)
					->with('categoryNewID', $categoryNewID)
					->with('detailNewID', $detailNewID)
					->with('category', $category)
					->with('segment', $segment)
					->with('detailList', $detailList)
					->with('expHead', $expHead)
					->with('array', $array);
		
	}

	//////////DETAIL///////////
	public function addDetail()
	{	
		$det = MeasurementDetail::all();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/[a-zA-Z\s\-\'\.]+$/";
		
		if(!trim(Input::get('addDetailName')) == '' && !trim(Input::get('addDetailDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addDetailName')) && preg_match($regex, Input::get('addDetailDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach ($det as $det)
			if(strcasecmp($det->strMeasurementDetailName, Input::get('addDetailName')) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$detail = MeasurementDetail::create(array(
				'strMeasurementDetailID' => Input::get('addDetailID'),
				'strMeasurementDetailName' => Input::get('addDetailName'),
				'strMeasurementDetailDesc' => Input::get('addDetailDesc'),
				'boolIsActive' => 1
				));

				$detail->save();
				return Redirect::to('/maintenance/measurements?successPart=true');
			}else return Redirect::to('/maintenance/measurements?successPart=duplicate');
		}else return Redirect::to('/maintenance/measurements?input=invalid');
	}

	public function editDetail()
	{
		$id = Input::get('editDetailID');
		$detail = MeasurementDetail::find($id);
		$validInput = TRUE;

		$regex = "/[a-zA-Z\s\-\'\.]+$/";
		
		if(!trim(Input::get('editDetailName')) == '' && !trim(Input::get('editDetailDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editDetailName')) && preg_match($regex, Input::get('editDetailDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		$det = MeasurementDetail::all();
		$isAdded = FALSE;

		foreach ($det as $det)
			if(!strcasecmp($det->strMeasurementID, Input::get('editDetailID') == 0 &&
				strcasecmp($det->strMeasurementDetailName, trim(Input::get('editDetailName'))) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$detail = MeasurementDetail::find($id);

				$detail->strMeasurementDetailName = Input::get('editDetailName');	
				$detail->strMeasurementDetailDesc = Input::get('editDetailDesc');

				$detail->save();
				return Redirect::to('/maintenance/measurements?successPartEdit=true');
		 	} else return Redirect::to('/maintenance/measurements?successPartEdit=duplicate');
		}else return Redirect::to('maintenance/measurements?input=invalid');
	}


	public function delDetail()
	{
		$id = Input::get('delDetailID');
		$detail = MeasurementDetail::find($id);

		$count = DB::table('tblMeasurementHeader')
            ->join('tblMeasurementDetail', 'tblMeasurementHeader.strMeasurementName', '=', 'tblMeasurementDetail.strMeasurementDetailID')
            ->select('tblMeasurementDetail.*')
            ->where('tblMeasurementDetail.strMeasurementDetailID','=', $id)
            ->count();

        if($count == 0){
        	$reasonDetail = ReasonMeasurementDetail::create(array(
        		'strInactiveDetailID' => Input::get('delInactiveDetail'),
        		'strInactiveReason' => Input::get('delInactiveReason')
        		));

        	$detail->boolIsActive = 0;
        	$reasonDetail->save();
        	$detail->save();
        	return Redirect::to('/maintenance/measurements?successPartDel=true');
        }else return Redirect::to('/maintenance/measurements?successPartDel=false');

	}

	public function reactDetail()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$detail = MeasurementDetail::find($id);

		$reas = Input::get('reactInactiveDetail');
		$reasonDetail = DB::table('tblReasonMeasurementDetail')->where('strInactiveDetailID', '=', $reas)->delete();

		$detail->boolIsActive = 1;

		$detail->save();
		return Redirect::to('/utilities/inactiveData?successRec=true');
	 } else return Redirect::to('/utilities/inactiveData?successRec=false');
	}


	////////CATEGORY/////////////
	public function addCategory()
	{	
		for($i = 0; $i < count(Input::get('addDetail')); $i++){

			$head = MeasurementHead::all();
			$isAdded = FALSE;

			foreach ($head as $head)
				if(strcasecmp($head->strCategoryName, Input::get('addCategory')) == 0 &&
					strcasecmp($head->strSegmentName, Input::get('addSegment')) == 0 &&
					strcasecmp($head->strMeasurementName, Input::get('addDetail')[$i]) == 0)
					$isAdded = TRUE;

			if(!$isAdded){
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

				return Redirect::to('/maintenance/measurements?successHead=true&isCat=true');
			}else return Redirect::to('/maintenance/measurements?successHead=duplicate&isCat=true');	
		}
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
		return Redirect::to('/maintenance/measurements?successHeadEdit=true&isCat=true');
	 } else return Redirect::to('/maintenance/measurements?successHeadEdit=duplicate&isCat=true');
	}

	public function delCategory()
	{
		$id = Input::get('delMeasurementID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$head = MeasurementHead::find($id);

		$reasonHead = ReasonMeasurementCategory::create(array(
			'strInactiveHeadID' => Input::get('delInactiveHead'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$head->boolIsActive = 0;
		$reasonHead->save();
		$head->save();
		return Redirect::to('/maintenance/measurements?successHeadDel=true&isCat=true');
	 } else return Redirect::to('/maintenance/measurements?successHeadDel=false&isCat=true');
	}

	public function reactCategory()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$head = MeasurementHead::find($id);

		$reas = Input::get('reactInactiveHead');
		$reasonHead = DB::table('tblReasonMeasurementCategory')->where('strInactiveHeadID', '=', $reas)->delete();

		$head->boolIsActive = 1;

		$head->save();
		return Redirect::to('/utilities/inactiveData?successRec=true&isCat=true');
	 } else return Redirect::to('/utilities/inactiveData?successRec=false&isCat=true');
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