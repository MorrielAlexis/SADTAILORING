<?php

class SwatchController extends BaseController{

	public function swatch()
	{

		$ids = DB::table('tblSwatches')
			->select('strSwatchID')
			->orderBy('created_at', 'desc')
			->orderBy('strSwatchID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strSwatchID;
		$newID = $this->smartCounter($ID);	

		$fabricType =  FabricType::all();
		$reason = ReasonSwatches::all();		
		
		$swatch = DB::table('tblSwatches')
            ->join('tblFabricType', 'tblSwatches.strSwatchFabricTypeName', '=', 'tblFabricType.strFabricTypeID')
            ->leftJoin('tblReasonSwatches', 'tblSwatches.strSwatchID', '=', 'tblReasonSwatches.strInactiveSwatchID')
            ->select('tblSwatches.*', 'tblFabricType.strFabricTypeName', 'tblReasonSwatches.strInactiveSwatchID', 'tblReasonSwatches.strInactiveReason')
            ->get();

		return View::make('fabricAndMaterialsSwatches')
					->with('swatch', $swatch)
					->with('fabricType', $fabricType)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function addSwatch()
	{		
		$file = Input::get('addImage');
		$destinationPath = 'public/imgSwatches';

		$swa = Swatch::all();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
		$regexCode = "/[a-zA-Z0-9]+$/";
		
		if(!trim(Input::get('addSwatchName')) == '' && !trim(Input::get('addSwatchCode')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addSwatchName')) && preg_match($regexCode, Input::get('addSwatchCode'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach ($swa as $swa)
			if(strcasecmp($swa->strSwatchFabricTypeName, Input::get('addFabric')) == 0 && 
			   (strcasecmp($swa->strSwatchName, trim(Input::get('addSwatchName'))) == 0 ||
			   strcasecmp($swa->strSwatchCode, trim(Input::get('addSwatchCode'))) == 0))
			   		$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if($file == '' || $file == null){
				$swatch = Swatch::create(array(
				'strSwatchID' => Input::get('addSwatchID'),
				'strSwatchFabricTypeName' => Input::get('addFabric'),		
				'strSwatchName' => trim(Input::get('addSwatchName')),
				'strSwatchCode' => trim(Input::get('addSwatchCode')),
				'boolIsActive' => 1
				));
				}else{
					$extension = Input::file('addImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('addImg')->move($destinationPath, $fileName);

					$swatch = Swatch::create(array(
					'strSwatchID' => Input::get('addSwatchID'),
					'strSwatchFabricTypeName' => Input::get('addFabric'),		
					'strSwatchName' => trim(Input::get('addSwatchName')),
					'strSwatchCode' => trim(Input::get('addSwatchCode')),
					'strSwatchImage' => 'imgSwatches/'.$fileName,
					'boolIsActive' => 1
					));
				}	

				$swatch->save();
				return Redirect::to('/maintenance/fabricAndMaterialsSwatches?success=true');
			} else return Redirect::to('/maintenance/fabricAndMaterialsSwatches?success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsSwatches?input=invalid');
	}

	public function editSwatch()
	{	
		$id = Input::get('editSwatchID');
		$swatch = Swatch::find($id);

		$swa = Swatch::all();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
		$regexCode = "/[a-zA-Z0-9]+$/";
		
		if(!trim(Input::get('editSwatchName')) == '' && !trim(Input::get('editSwatchCode')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editSwatchName')) && preg_match($regexCode, Input::get('editSwatchCode'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach ($swa as $swa)
			if(!strcasecmp($swa->strSwatchID, Input::get('editSwatchID')) == 0 &&
			   strcasecmp($swa->strSwatchFabricTypeName, Input::get('editFabric')) == 0 && 
			   strcasecmp($swa->strSwatchName, trim(Input::get('editSwatchName'))) == 0 &&
			   strcasecmp($swa->strSwatchCode, trim(Input::get('editSwatchCode'))) == 0)
			   		$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){	
				if(Input::get('editSwatchImage') == $swatch->strSwatchImage){
					$swatch->strSwatchFabricTypeName = Input::get('editFabric');		
					$swatch->strSwatchName = trim(Input::get('editSwatchName'));
					$swatch->strSwatchCode = trim(Input::get('editSwatchCode'));
				}else{

					$file = Input::get('editSwatchImage');
					$destinationPath = 'public/imgSwatches';
					$extension = Input::file('editImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('editImg')->move($destinationPath, $fileName);

					$swatch->strSwatchFabricTypeName = Input::get('editFabric');		
					$swatch->strSwatchName = trim(Input::get('editSwatchName'));
					$swatch->strSwatchCode = trim(Input::get('editSwatchCode'));
					$swatch->strSwatchImage = 'imgSwatches/'.$fileName;
				}

				$swatch->save();
				return Redirect::to('/maintenance/fabricAndMaterialsSwatches?successEdit=true');
			} else return Redirect::to('/maintenance/fabricAndMaterialsSwatches?success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsSwatches?input=invalid');
	}

	public function delSwatch()
	{
		$id = Input::get('delSwatchID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$swatch = Swatch::find($id);

    	$reason = ReasonSwatches::create(array(
    		'strInactiveSwatchID' => Input::get('delInactiveSwatch'),
    		'strInactiveReason' => Input::get('delInactiveReason')
    		));

		$swatch->boolIsActive = 0;
		$reason->save();
		$swatch->save();
		return Redirect::to('/maintenance/fabricAndMaterialsSwatches?successDel=true');
	 } else return Redirect::to('/maintenance/fabricAndMaterialsSwatches?successDel=false');
	}

	public function reactSwatch()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$swatch = Swatch::find($id);

		$reas = Input::get('reactInactiveSwatch');
		$reason = DB::table('tblReasonSwatches')
						->where('strInactiveSwatchID', '=', $reas)
						->delete();

		$swatch->boolIsActive = 1;

		$swatch->save();
		return Redirect::to('/utilities/inactiveData?successRec=true');
	 } else return Redirect::to('/utilities/inactiveData?successRec=false');
	}

			//////////SMART COUNTER////////////
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