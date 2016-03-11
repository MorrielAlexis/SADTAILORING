<?php

class GarmentSegmentController extends BaseController{
	

	public function segment()
	{	
		$ids = DB::table('tblGarmentSegment')
			->select('strGarmentSegmentID')
			->orderBy('created_at', 'desc')
			->orderBy('strGarmentSegmentID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strGarmentSegmentID;
		$newID = $this->smartCounter($ID);	

		$category =  Category::all();
		$reason = ReasonSegment::all();

		$segment = DB::table('tblGarmentSegment')
            ->join('tblGarmentCategory', 'tblGarmentSegment.strCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->leftJoin('tblReasonSegment', 'tblGarmentSegment.strGarmentSegmentID', '=', 'tblReasonSegment.strInactiveSegmentID')
            ->select('tblGarmentSegment.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblReasonSegment.strInactiveSegmentID', 'tblReasonSegment.strInactiveReason')
            ->get();

		return View::make('garmentsDetails')
					->with('segment', $segment)
					->with('category', $category)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function addGarmentSegment()
	{	
		$seg = Segment::all();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
		$regexDesc = "/^[a-zA-Z\'\-\.\,]+( [a-zA-Z\,\'\-\.]+)*$/";
		
		if(!trim(Input::get('addSegmentName')) == '' || !trim(Input::get('addSegmentDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addSegmentName')) && preg_match($regexDesc, Input::get('addSegmentDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach ($seg as $seg)
			if(strcasecmp($seg->strGarmentSegmentName, trim(Input::get('addSegmentName'))) == 0 && 
			   strcasecmp($seg->strCategory, Input::get('addCategory')) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$segment = Segment::create(array(
					'strGarmentSegmentID' => Input::get('addSegmentID'),
					'strCategory' => Input::get('addCategory'),
					'strGarmentSegmentName' => trim(Input::get('addSegmentName')),
					'strGarmentSegmentDesc' => trim(Input::get('addSegmentDesc')),
					'boolIsActive' => 1
					));

				$segment->save();
				return Redirect::to('/maintenance/garmentsDetails?success=true');
			} else return Redirect::to('/maintenance/garmentsDetails?success=duplicate');
		}else return Redirect::to('/maintenance/garmentsDetails?input=invalid');
	}

	public function editGarmentSegment()
	{
		$id = Input::get('editSegmentID');
		$segment = Segment::find($id);

		$segs = Segment::all();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
		$regexDesc = "/^[a-zA-Z\'\-\.\,]+( [a-zA-Z\,\'\-\.]+)*$/";;
		
		if(!trim(Input::get('editSegmentName')) == '' || !trim(Input::get('editSegmentDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editSegmentName')) && preg_match($regexDesc, Input::get('editSegmentDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach ($segs as $seg)
			if(!strcasecmp($seg->strGarmentSegmentID, Input::get('editSegmentID')) == 0 &&
			   strcasecmp($seg->strGarmentSegmentName, trim(Input::get('editSegmentName'))) == 0 && 
			   strcasecmp($seg->strCategory, Input::get('editCategory')) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$segment->strCategory = Input::get('editCategory');	
				$segment->strGarmentSegmentName = trim(Input::get('editSegmentName'));	
				$segment->strGarmentSegmentDesc = trim(Input::get('editSegmentDesc'));
				
				$segment->save();
				return Redirect::to('/maintenance/garmentsDetails?successEdit=true');
			} else return Redirect::to('/maintenance/garmentsDetails?successEdit=duplicate');
		}else return Redirect::to('/maintenance/garmentsDetails?input=invalid');
	}

	public function delGarmentSegment()
	{	
		$id = Input::get('delSegmentID');
	
		$segment = Segment::find($id);

		$count = DB::table('tblDesignPattern')
            ->join('tblGarmentSegment', 'tblDesignPattern.strDesignSegmentName', '=', 'tblGarmentSegment.strGarmentSegmentID')
            ->select('tblGarmentSegment.*')
            ->where('tblGarmentSegment.strGarmentSegmentID','=', $id)
            ->count();

        $count2 = DB::table('tblMeasurementHeader')
            ->join('tblGarmentSegment', 'tblMeasurementHeader.strSegmentName', '=', 'tblGarmentSegment.strGarmentSegmentID')
            ->select('tblGarmentSegment.*')
            ->where('tblGarmentSegment.strGarmentSegmentID','=', $id)
            ->count();

		if ($count == 0 && $count2 == 0) {
        	$reason = ReasonSegment::create(array(
        		'strInactiveSegmentID' => Input::get('delInactiveSegment'),
        		'strInactiveReason' => Input::get('delInactiveReason')
        		));
        	$segment->boolIsActive = 0;
        	$reason->save();
        	$segment->save();
        	return Redirect::to('/maintenance/garmentsDetails?successDel=true');
        } else return Redirect::to('/maintenance/garmentsDetails?success=beingUsed');
       
	}

	public function reactGarmentCategory()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;

	if(!$isAdded){
		$category = Category::find($id);

		$reas = Input::get('reactInactiveGarment');
		$reason = DB::table('tblReasonGarmentCategory')
						->where('strInactiveGarmentID', '=', $reas)
						->delete();

		$category->boolIsActive = 1;

		$category->save();
		return Redirect::to('/utilities/inactiveData?successRec=true');
	 	} else return Redirect::to('/utilities/inactiveData?successRec=false');
	}

	public function reactGarmentSegment()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$segment = Segment::find($id);

		$reas = Input::get('reactInactiveSegment');
		$reason = DB::table('tblReasonSegment')
						->where('strInactiveSegmentID', '=', $reas)
						->delete();

		$segment->boolIsActive = 1;

		$segment->save();
		return Redirect::to('/utilities/inactiveData?successRec=true');
	 }else return Redirect::to('/utilities/inactiveData?successRec=false');
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