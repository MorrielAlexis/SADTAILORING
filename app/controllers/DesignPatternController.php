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

		$segment = Segment::lists('strGarmentSegmentName', 'strGarmentSegmentID');

		$pattern = DB::table('tblDesignPattern')
				->join('tblGarmentSegment', 'tblDesignPattern.strDesignSegmentName', '=', 'tblGarmentSegment.strGarmentSegmentID')
				->select('tblDesignPattern.*', 'tblGarmentSegment.strGarmentSegmentName')
				->orderBy('strDesignPatternID')
				->get();

		return View::make('designPattern')
						->with('newID', $newID)
						->with('pattern', $pattern)
						->with('pattern2', $pattern)
						->with('segment', $segment);
	}

	public function addPattern()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgDesignPatterns';
		$extension = Input::file('addImg')->getClientOriginalExtension();
		$fileName = $file;
		Input::file('addImg')->move($destinationPath, $fileName);

		$pattern = DesignPattern::create(array(
			'strDesignPatternID' => Input::get('addPatternID'),
			'strDesignSegmentName' => Input::get('addSegment'),
			'strPatternName' => Input::get('addPatternName'),
			'strPatternImage' => 'imgDesignPatterns/'.$fileName,
			'boolIsActive' => 1
			));		

		$pattern->save();

		return Redirect::to('/designPattern');
	}

	public function editPattern()
	{
		$id = Input::get('editPatternID');
		$pattern = DesignPattern::find($id);

		$file = Input::get('editImage');
		$destinationPath = 'public/designPatterns';
		$extension = Input::file('editImg')->getClientOriginalExtension();
		$fileName = $file;
		Input::file('editImg')->move($destinationPath, $fileName);

		$pattern->strDesignSegmentName = Input::get('editSegment');
		$pattern->strPatternName = Input::get('editPatternName');
		$pattern->strPatternImage = 'designPatterns/'.$fileName;

		$pattern->save();
		return Redirect::to('/designPattern');
	}

	public function delPattern()
	{
		$id = Input::get('delPatternID');
		$pattern = DesignPattern::find($id);

		$pattern->boolIsActive = 0;

		$pattern->save();
		return Redirect::to('/designPattern');
	}

	public function reactPattern()
	{
		$id = Input::get('reactID');
		$pattern = DesignPattern::find($id);

		$pattern->boolIsActive = 1;

		$pattern->save();
		return Redirect::to('/designPattern');
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