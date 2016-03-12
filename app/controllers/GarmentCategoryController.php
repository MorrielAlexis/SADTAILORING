<?php

class GarmentCategoryController extends BaseController{
	
	
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
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function addGarmentCategory()
	{	
		$garms = Category::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
		$regexDesc = "/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/";
		
		if(!trim(Input::get('addGarmentName')) == '' || !trim(Input::get('addGarmentDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addGarmentName')) && preg_match($regexDesc, Input::get('addGarmentDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach($garms as $garm)
			if(strcasecmp($garm->strGarmentCategoryName, trim(Input::get('addGarmentName'))) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$garment = Category::create(array(
				'strGarmentCategoryID' => Input::get('addGarmentID'),
				'strGarmentCategoryName' => trim(Input::get('addGarmentName')),
				'strGarmentCategoryDesc' => trim(Input::get('addGarmentDesc')),
				'boolIsActive' => 1
				));

				$garment->save();
				return Redirect::to('/maintenance/garments?success=true');
			}else return Redirect::to('/maintenance/garments?success=duplicate');
		}else return Redirect::to('/maintenance/garments?input=invalid');
	}

	public function editGarmentCategory()
	{
		$id = Input::get('editGarmentID');
		$garments = Category::find($id);

		$garms = Category::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
		$regexDesc = "/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/";
		
		if(!trim(Input::get('editGarmentName')) == '' && !trim(Input::get('editGarmentDescription')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editGarmentName')) && preg_match($regexDesc, Input::get('editGarmentDescription'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach($garms as $garm)
			if(!strcasecmp($garm->strGarmentCategoryID, Input::get('editGarmentID')) == 0 &&
				strcasecmp($garm->strGarmentCategoryName, trim(Input::get('editGarmentName'))) == 0)
				$isAdded = TRUE;

			if($validInput){
				if(!$isAdded){		
					$garments->strGarmentCategoryName = Input::get('editGarmentName');	
					$garments->strGarmentCategoryDesc = trim(Input::get('editGarmentDescription'));
			
					$garments->save();
					return Redirect::to('/maintenance/garments?successEdit=true');
				}else return Redirect::to('/maintenance/garments?success=duplicate');
			}else return Redirect::to('/maintenance/garments?input=invalid');
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
	        	$reason = ReasonGarmentCategory::create(array(
	        		'strInactiveGarmentID' => Input::get('delInactiveGarment'),
	        		'strInactiveReason' => Input::get('delInactiveReason')
	        		));
	        	$category->boolIsActive = 0;
	        	$reason->save();
	        	$category->save();
	        	return Redirect::to('/maintenance/garments?successDel=true');
	        } else return Redirect::to('/maintenance/garments?success=beingUsed');
	        	
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