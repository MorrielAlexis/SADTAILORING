<?php

class DesignPatternController extends BaseController{
	
	
	public function pattern()
	{	
		$ids = DB::table('tblDesignPattern')
			->select('strDesignPatternID')
			->orderBy('created_at', 'desc')
			->orderBy('strDesignPatternID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strDesignPatternID;
		$newID = $this->smartCounter($ID);	

		$category = Category::all();
		$segment = Segment::all();
		$reason = ReasonDesignPattern::all();

		$pattern = DB::table('tblDesignPattern')
            	->join('tblGarmentCategory', 'tblDesignPattern.strDesignCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
				->join('tblGarmentSegment', 'tblDesignPattern.strDesignSegmentName', '=', 'tblGarmentSegment.strGarmentSegmentID')
				->leftJoin('tblReasonDesignPattern', 'tblDesignPattern.strDesignPatternID', '=', 'tblReasonDesignPattern.strInactivePatternID')
				->select('tblDesignPattern.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblGarmentSegment.strGarmentSegmentName', 'tblReasonDesignPattern.strInactivePatternID', 'tblReasonDesignPattern.strInactiveReason')
				->orderBy('strDesignPatternID')
				->get();

		return View::make('designPattern')
						->with('newID', $newID)
						->with('pattern', $pattern)
						->with('category', $category)
						->with('reason', $reason)
						->with('segment', $segment);
	}

	public function addPattern()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgDesignPatterns';

		$pat = DesignPattern::all();
		$isAdded = FALSE;

		foreach ($pat as $pat) 
			if(strcasecmp($pat->strDesignCategory, Input::get('addCategory')) == 0 && 
			   strcasecmp($pat->strDesignSegmentName, Input::get('addSegment')) == 0 && 
			   strcasecmp($pat->strPatternName, trim(Input::get('addPatternName'))) == 0)
				$isAdded = TRUE;


		if(!$isAdded){
			if($file == '' || $file == null){
			$pattern = DesignPattern::create(array(
			'strDesignPatternID' => Input::get('addPatternID'),
			'strDesignCategory' => Input::get('addCategory'),
			'strDesignSegmentName' => Input::get('addSegment'),
			'strPatternName' => trim(Input::get('addPatternName')),
			'boolIsActive' => 1
			));		
			}else{
				$extension = Input::file('addImg')->getClientOriginalExtension();
				$fileName = $file;
				Input::file('addImg')->move($destinationPath, $fileName);

				$pattern = DesignPattern::create(array(
				'strDesignPatternID' => Input::get('addPatternID'),
				'strDesignCategory' => Input::get('addCategory'),
				'strDesignSegmentName' => Input::get('addSegment'),
				'strPatternName' => trim(Input::get('addPatternName')),
				'strPatternImage' => 'imgDesignPatterns/'.$fileName,
				'boolIsActive' => 1
				));	
			}

			$pattern->save();
			return Redirect::to('/maintenance/designPattern?success=true');
		} else return Redirect::to('/maintenance/designPattern?success=duplicate');
	}

	public function editPattern()
	{
		$id = Input::get('editPatternID');
		$pattern = DesignPattern::find($id);

		$pat = DesignPattern::all();
		$isAdded = FALSE;

		foreach ($pat as $pat) 
			if(!strcasecmp($pat->strDesignPatternID, Input::get('editPatternID')) == 0 &&
			   strcasecmp($pat->strDesignCategory, Input::get('editCategory')) == 0 && 
			   strcasecmp($pat->strDesignSegmentName, Input::get('editSegment')) == 0 && 
			   strcasecmp($pat->strPatternName, trimInput::get('editPatternName'))) == 0)
				$isAdded = TRUE;


		if(!$isAdded){
			if(Input::get('editImage') == $pattern->strPatternImage){
				$pattern->strDesignCategory = Input::get('editCategory');
				$pattern->strDesignSegmentName = Input::get('editSegment');
				$pattern->strPatternName = trimInput::get('editPatternName'));
			}else{
				$file = Input::get('editImage');
				$destinationPath = 'public/imgDesignPatterns';
				$extension = Input::file('editImg')->getClientOriginalExtension();
				$fileName = $file;
				Input::file('editImg')->move($destinationPath, $fileName);

				$pattern->strDesignCategory = Input::get('editCategory');
				$pattern->strDesignSegmentName = Input::get('editSegment');
				$pattern->strPatternName = trimInput::get('editPatternName'));
				$pattern->strPatternImage = 'imgDesignPatterns/'.$fileName;
			}			
			$pattern->save();
			return Redirect::to('/maintenance/designPattern?successEdit=true');
		}else return Redirect::to('/maintenance/designPattern?success=duplicate');
	}

	public function delPattern()
	{
		$id = Input::get('delPatternID');
		$isDeleted = FALSE;

	if(!$isDeleted){
		$pattern = DesignPattern::find($id);

		$reason = ReasonDesignPattern::create(array(
			'strInactivePatternID' => Input::get('delInactivePattern'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$pattern->boolIsActive = 0;
		$reason->save();
		$pattern->save();
		return Redirect::to('/maintenance/designPattern?successDel=true');
	 } else return Redirect::to('/maintenance/designPattern?successDel=false');
	}

	public function reactPattern()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$pattern = DesignPattern::find($id);

		$reas = Input::get('reactInactivePattern');
		$reason = DB::table('tblReasonDesignPattern')
						->where('strInactivePatternID', '=', $reas)
						->delete();

		$pattern->boolIsActive = 1;

		$pattern->save();
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