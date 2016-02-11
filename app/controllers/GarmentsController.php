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

		return View::make('garments')->with('category', $category)->with('newID', $newID);
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

		$category =  Category::lists('strGarmentCategoryName', 'strGarmentCategoryID');

		$segment = DB::table('tblGarmentSegment')
            ->join('tblGarmentCategory', 'tblGarmentSegment.strCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->select('tblGarmentSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
            ->get();

		return View::make('garmentsDetails')
					->with('segment', $segment)
					->with('category', $category)
					->with('newID', $newID);
	}

	public function designPattern()
	{
		return View::make('designPattern');
	}

	public function measurements()
	{
		return View::make('measurements');
	}

	public function addGarmentCategory()
	{
		$garment = Category::create(array(
			'strGarmentCategoryID' => Input::get('addGarmentID'),
			'strGarmentCategoryName' => Input::get('addGarmentName'),
			'txtGarmentCategoryDesc' => Input::get('addGarmentDesc')
			));

		$garment->save();
		return Redirect::to('/garments');
	}

	public function editGarmentCategory()
	{
		$id = Input::get('editGarmentID');
		$garments = Category::find($id);

		$garments->strGarmentCategoryName = Input::get('editGarmentName');	
		$garments->txtGarmentCategoryDesc = Input::get('editGarmentDescription');

		$garments->save();
		return Redirect::to('/garments');
	}	

	public function addGarmentSegment()
	{	
		$segment = Segment::create(array(
			'strGarmentSegmentID' => Input::get('addSegmentID'),
			'strCategory' => Input::get('addCategory'),
			'strSegmentName' => Input::get('addSegmentName'),
			'txtSegmentDesc' => Input::get('addSegmentDesc')
			));

		$segment->save();
		return Redirect::to('/garmentsDetails');
	}

	public function editGarmentSegment()
	{
		$id = Input::get('editSegmentID');
		$segment = Segment::find($id);

		$segment->strCategory = Input::get('editCategory');	
		$segment->strSegmentName = Input::get('editSegmentName');	
		$segment->txtSegmentDesc = Input::get('editSegmentDesc');

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