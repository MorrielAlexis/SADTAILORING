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

		return View::make('garments')->with('category', $category)->with('category2', $category)->with('newID', $newID);
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

		$segment = DB::table('tblGarmentSegment')
            ->join('tblGarmentCategory', 'tblGarmentSegment.strCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->select('tblGarmentSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
            ->get();

		return View::make('garmentsDetails')
					->with('segment', $segment)
					->with('segment2', $segment)
					->with('category', $category)
					->with('category2', $category)
					->with('newID', $newID);
	}

	public function designPattern()
	{
		return View::make('designPattern');
	}

	public function addGarmentCategory()
	{	
		$garm = Category::get();
		$isAdded = FALSE;

		foreach($garm as $garm)
			if(strcmp($garm->strGarmentCategoryName, Input::get('addGarmentName')))
				$isAdded = TRUE;

		if(!$isAdded){
			$garment = Category::create(array(
			'strGarmentCategoryID' => Input::get('addGarmentID'),
			'strGarmentCategoryName' => Input::get('addGarmentName'),
			'strGarmentCategoryDesc' => Input::get('addGarmentDesc'),
			'boolIsActive' => 1
			));

			$garment->save();
		}
		
		return Redirect::to('/garments');
	}

	public function editGarmentCategory()
	{
		$id = Input::get('editGarmentID');
		$garments = Category::find($id);

		$garments->strGarmentCategoryName = Input::get('editGarmentName');	
		$garments->strGarmentCategoryDesc = Input::get('editGarmentDescription');

		$garments->save();
		return Redirect::to('/garments');
	}	

	public function delGarmentCategory()
	{
		$id = Input::get('delGarmentID');
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
        	$category->boolIsActive = 0;
        	$category->save();
        	return Redirect::to('/garments');
        } else {
        	return Redirect::to('/garments');
        }

	}

	public function addGarmentSegment()
	{	
		$seg = Segment::all();
		$isAdded = FALSE;

		foreach ($seg as $seg)
			if(strcasecmp($seg->strGarmentSegmentName, Input::get('addSegmentName')) & strcasecmp($seg->strCategory, Input::get('addCategory')))
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
		}

		return Redirect::to('/garmentsDetails');
	}

	public function editGarmentSegment()
	{
		$id = Input::get('editSegmentID');
		$segment = Segment::find($id);

		$segment->strCategory = Input::get('editCategory');	
		$segment->strGarmentSegmentName = Input::get('editSegmentName');	
		$segment->strGarmentSegmentDesc = Input::get('editSegmentDesc');

		$segment->save();
		return Redirect::to('/garmentsDetails');
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
        	$segment->boolIsActive = 0;
        	$segment->save();
        	return Redirect::to('/garmentsDetails');
        } else {
        	return Redirect::to('/garmentsDetails');
        }

	}

	public function reactGarmentCategory()
	{
		$id = Input::get('reactID');
		$category = Category::find($id);

		$category->boolIsActive = 1;

		$category->save();
		return Redirect::to('/garments');
	}

	public function reactGarmentSegment()
	{
		$id = Input::get('reactID');
		$segment = Segment::find($id);

		$segment->boolIsActive = 1;

		$segment->save();
		return Redirect::to('/garmentsDetails');
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