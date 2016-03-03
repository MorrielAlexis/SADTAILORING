<?php

class GarmentsController extends BaseController{
	
	
	public function category()
	{	
		$ids = DB::table('tblGarmentCategory')
			->select('strGarmentCategoryID')
			->orderBy('created_at', 'desc')
			->orderBy('strGarmentCategoryID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strGarmentCategoryID;
		$newID = $this->smartCounter($ID);	

		$category = Category::all();
		$reason = ReasonGarmentCategory::all();

		$category = DB::table('tblGarmentCategory')
				->leftJoin('tblReasonGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblReasonGarmentCategory.strInactiveGarmentID')
				->select('tblGarmentCategory.*', 'tblReasonGarmentCategory.strInactiveGarmentID', 'tblReasonGarmentCategory.strInactiveReason')
				->orderBy('created_at')
				->get();

		return View::make('garments')
					->with('category', $category)
					->with('category2', $category)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function details()
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
					->with('segment2', $segment)
					->with('category', $category)
					->with('category2', $category)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function addGarmentCategory()
	{	
		$garm = Category::get();
		$isAdded = FALSE;

		foreach($garm as $garm)
			if(strcasecmp($garm->strGarmentCategoryName, Input::get('addGarmentName')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$garment = Category::create(array(
			'strGarmentCategoryID' => Input::get('addGarmentID'),
			'strGarmentCategoryName' => Input::get('addGarmentName'),
			'strGarmentCategoryDesc' => Input::get('addGarmentDesc'),
			'boolIsActive' => 1
			));

			$garment->save();
			return Redirect::to('/maintenance/garments?success=true');
		}else return Redirect::to('/maintenance/garments?success=duplicate');
	}

	public function editGarmentCategory()
	{
		$id = Input::get('editGarmentID');
		$garments = Category::find($id);

		$garm = Category::get();
		$isAdded = FALSE;

		foreach($garm as $garm)
			if(!strcasecmp($garm->strGarmentCategoryID, Input::get('editGarmentID')) == 0 &&
				strcasecmp($garm->strGarmentCategoryName, Input::get('editGarmentName')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){		
			$garments->strGarmentCategoryName = Input::get('editGarmentName');	
			$garments->strGarmentCategoryDesc = Input::get('editGarmentDescription');
	
			$garments->save();
			return Redirect::to('/maintenance/garments?successEdit=true');
		}else return Redirect::to('/maintenance/garments?success=duplicate');
	}	

	public function delGarmentCategory()
	{
		$id = Input::get('delGarmentID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$category = Category::find($id);

		$count = DB::table('tblGarmentSegment')
            ->join('tblGarmentCategory', 'tblGarmentSegment.strCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->select('tblGarmentCategory.*')
            ->where('tblGarmentCategory.strGarmentCategoryID','=', $id)
            ->count();

        $count2 = DB::table('tblMeasurementHeader')
            ->join('tblGarmentCategory', 'tblMeasurementHeader.strCategoryName', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->select('tblGarmentCategory.*')
            ->where('tblGarmentCategory.strGarmentCategoryID','=', $id)
            ->count();

        if ($count == 0 && $count2 == 0) {
        	$reason = ReasonGarmentCategory::create(array(
        		'strInactiveGarmentID' => Input::get('delInactiveGarment'),
        		'strInactiveReason' => Input::get('delInactiveReason')
        		));
        	$category->boolIsActive = 0;
        	$reason->save();
        	$category->save();
        	return Redirect::to('/maintenance/garments?successDel=true');
        } else {
        	return Redirect::to('/maintenance/garments?successDel=true');
        }
     } else return Redirect::to('/maintenance/garments?successDel=false');

	}

	public function addGarmentSegment()
	{	
		$seg = Segment::all();
		$isAdded = FALSE;

		foreach ($seg as $seg)
			if(strcasecmp($seg->strGarmentSegmentName, Input::get('addSegmentName')) == 0 && 
			   strcasecmp($seg->strCategory, Input::get('addCategory')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$segment = Segment::create(array(
				'strGarmentSegmentID' => Input::get('addSegmentID'),
				'strCategory' => Input::get('addCategory'),
				'strGarmentSegmentName' => Input::get('addSegmentName'),
				'strGarmentSegmentDesc' => Input::get('addSegmentDesc'),
				'boolIsActive' => 1
				));

			$segment->save();
			return Redirect::to('/maintenance/garmentsDetails?success=true');
		} else return Redirect::to('/maintenance/garmentsDetails?success=duplicate');
	}

	public function editGarmentSegment()
	{
		$id = Input::get('editSegmentID');
		$segment = Segment::find($id);

		$seg = Segment::all();
		$isAdded = FALSE;

		foreach ($seg as $seg)
			if(!strcasecmp($seg->strGarmentSegmentID, Input::get('editSegmentID')) == 0 &&
			   strcasecmp($seg->strGarmentSegmentName, Input::get('editSegmentName')) == 0 && 
			   strcasecmp($seg->strCategory, Input::get('editCategory')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$segment->strCategory = Input::get('editCategory');	
			$segment->strGarmentSegmentName = Input::get('editSegmentName');	
			$segment->strGarmentSegmentDesc = Input::get('editSegmentDesc');
			
			$segment->save();
			return Redirect::to('/maintenance/garmentsDetails?successEdit=true');
		} else return Redirect::to('/maintenance/garmentsDetails?successEdit=duplicate');
	}

	public function delGarmentSegment()
	{	
		$id = Input::get('delSegmentID');
		$isDeleted = FALSE;


	if(!$isDeleted){
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
        } else return Redirect::to('/maintenance/garmentsDetails?successDel=false');
       

	}}

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
		return Redirect::to('/maintenance/garments?successRec=true');
	 	} else return Redirect::to('/maintenance/garments?successRec=false');
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
		return Redirect::to('/maintenance/garmentsDetails?successRec=true');
	 }else return Redirect::to('/maintenance/garmentsDetails?successRec=false');
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