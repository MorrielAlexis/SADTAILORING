<?php

class FabricController extends BaseController{
	

	public function fabricType()
	{

		$ids = DB::table('tblFabricType')
			->select('strFabricTypeID')
			->orderBy('created_at', 'desc')
			->orderBy('strFabricTypeID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strFabricTypeID;
		$newID = $this->smartCounter($ID);	

		$fabricType = FabricType::all();
		$reason = ReasonFabricType::all();

		$fabricType = DB::table('tblFabricType')
				->leftJoin('tblReasonFabricType', 'tblFabricType.strFabricTypeID', '=', 'tblReasonFabricType.strInactiveFabricTypeID')
				->select('tblFabricType.*', 'tblReasonFabricType.strInactiveFabricTypeID', 'tblReasonFabricType.strInactiveReason')
				->orderBy('created_at')
				->get();

		return View::make('fabricAndMaterialsFabricType')
					->with('fabricType', $fabricType)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function addFabricType()
	{	
		$fabrics = FabricType::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		//dd(preg_match($regex, Input::get('addFabricTypeName')), preg_match($regex, Input::get('addFabricTypeDesc')));
		if(!trim(Input::get('addFabricTypeName')) == '' && !trim(Input::get('addFabricTypeDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addFabricTypeName')) && preg_match($regex, Input::get('addFabricTypeDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($fabrics as $fabric)
			if(strcasecmp($fabric->strFabricTypeName, trim(Input::get('addFabricTypeName'))) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded ){
				$fabricType = FabricType::create(array(
				'strFabricTypeID' => Input::get('addFabricTypeID'),
				'strFabricTypeName' => trim(Input::get('addFabricTypeName')),
				'strFabricTypeDesc' => trim(Input::get('addFabricTypeDesc')),
				'boolIsActive' => 1
				));

				$fabricType->save();
				return Redirect::to('/maintenance/fabricAndMaterialsFabricType?success=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsFabricType?success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsFabricType?input=invalid');

	}

	public function editFabricType()
	{	
		$id = Input::get('editFabricTypeID');
		$fabricType = FabricType::find($id);

		$fabrics = FabricType::get();
		$isAdded = FALSE;

		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		
		if(!trim(Input::get('editFabricTypeName')) == '' || !trim(Input::get('editFabricTypeDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editFabricTypeName')) && preg_match($regex, Input::get('editFabricTypeDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach($fabrics as $fabric)
			if(!strcasecmp($fabric->strFabricTypeID, Input::get('editFabricTypeID')) == 0 &&
				strcasecmp($fabric->strFabricTypeName, trim(Input::get('editFabricTypeName'))) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$fabricType = FabricType::find($id);
				$fabricType->strFabricTypeName = trim(Input::get('editFabricTypeName'));	
				$fabricType->strFabricTypeDesc = trim(Input::get('editFabricTypeDesc'));

				$fabricType->save();
				return Redirect::to('/maintenance/fabricAndMaterialsFabricType?successEdit=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsFabricType?success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsFabricType?input=invalid');
	}


	public function delFabricType()
	{
		$id = Input::get('delFabricID');
		$isDeleted = FALSE;

		if(!$isDeleted){
			$fabricType = FabricType::find($id);

	    	$reason = ReasonFabricType::create(array(
	    		'strInactiveFabricTypeID' => Input::get('delInactiveFabricType'),
	    		'strInactiveReason' => Input::get('delInactiveReason')
	    		));

			$fabricType->boolIsActive = 0;
			$reason->save();
			$fabricType->save();
			return Redirect::to('/maintenance/fabricAndMaterialsFabricType?successDel=true');
		 } else return Redirect::to('/maintenance/fabricAndMaterialsFabricType?successDel=false');
	}

	public function reactFabricType()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;

		if(!$isAdded){
			$fabricType = FabricType::find($id);

			$reas = Input::get('reactInactiveFabric');
			$reason = DB::table('tblReasonFabricType')
							->where('strInactiveFabricTypeID', '=', $reas)
							->delete();

			$fabricType->boolIsActive = 1;

			$fabricType->save();
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