<?php

class CustomerIndividualController extends BaseController{


	public function individual()
	{
		$ids = DB::table('tblCustPrivateIndividual')
			->select('strCustPrivIndivID')
			->orderBy('created_at', 'desc')
			->orderBy('strCustPrivIndivID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strCustPrivIndivID;
		$newID = $this->smartCounter($ID);	

		$individual = PrivateIndividual::all();
		$reason = ReasonIndividual::all();

		$individual = DB::table('tblCustPrivateIndividual')
				->leftJoin('tblReasonIndividual', 'tblCustPrivateIndividual.strCustPrivIndivID', '=', 'tblReasonIndividual.strInactiveIndividualID')
				->select('tblCustPrivateIndividual.*', 'tblReasonIndividual.strInactiveIndividualID', 'tblReasonIndividual.strInactiveReason')
				->orderBy('created_at')
				->get();

		return View::make('customerIndividual')
					->with('individual', $individual)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function addCustPrivIndiv()
	{
		$ind = PrivateIndividual::get();
		$isAdded = FALSE;

		$count = DB::table('tblCustPrivateIndividual')
            ->select('tblCustPrivateIndividual.strCustPrivEmailAddress')
            ->where('tblCustPrivateIndividual.strCustPrivEmailAddress','=', trim(Input::get('addEmail')))
            ->count();

        $count2 = DB::table('tblCustPrivateIndividual')
            ->select('tblCustPrivateIndividual.strCustPrivCPNumber')
            ->where('tblCustPrivateIndividual.strCustPrivCPNumber','=', trim(Input::get('addCel')))
            ->count();

        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach ($ind as $ind){
				if(strcasecmp($ind->strCustPrivFName, trim(Input::get('addFName'))) == 0 && 
				   strcasecmp($ind->strCustPrivMName, trim(Input::get('addMName'))) == 0 && 
				   strcasecmp($ind->strCustPrivLName, trim(Input::get('addLName'))) == 0) {
						$isAdded = TRUE;
					}			
			}	
        }

		if(!$isAdded){
			$individual = PrivateIndividual::create(array(
				'strCustPrivIndivID' => Input::get('addIndiID'),
				'strCustPrivFName' => trim(Input::get('addFName')),		
				'strCustPrivMName' => trim(Input::get('addMName')),
				'strCustPrivLName' => trim(Input::get('addLName')),
				'strCustPrivHouseNo' => trim(Input::get('addCustPrivHouseNo')),	
				'strCustPrivStreet' => trim(Input::get('addCustPrivStreet')),
				'strCustPrivBarangay' => trim(Input::get('addCustPrivBarangay')),	
				'strCustPrivCity' => trim(Input::get('addCustPrivCity')),	
				'strCustPrivProvince' => trim(Input::get('addCustPrivProvince')),
				'strCustPrivZipCode' => trim(Input::get('addCustPrivZipCode')),
				'strCustPrivLandlineNumber' => trim(Input::get('addPhone')),
				'strCustPrivCPNumber' => trim(Input::get('addCel')), 
				'strCustPrivCPNumberAlt' => trim(Input::get('addCelAlt')),
				'strCustPrivEmailAddress' => trim(Input::get('addEmail')),
				'boolIsActive' => 1
				));

			$individual->save();
			return Redirect::to('/maintenance/customerIndividual?success=true');
		}else return Redirect::to('/maintenance/customerIndividual?success=duplicate');

		
	}

	public function editCustPrivIndiv()
	{	
		$id = Input::get('editIndiID');
		$individual = PrivateIndividual::find($id);

		$ind = PrivateIndividual::get();
		$isAdded = FALSE;

		$count = 0; $count2 = 0;

		if(!($individual->strCustPrivEmailAddress == trim(Input::get('editEmail')))){
			$count = DB::table('tblCustPrivateIndividual')
	            ->select('tblCustPrivateIndividual.strCustPrivEmailAddress')
	            ->where('tblCustPrivateIndividual.strCustPrivEmailAddress','=', trim(Input::get('editEmail')))
	            ->count();
	    }

	    if(!($individual->strCustPrivCPNumber == trim(Input::get('editCel')))){
	    	$count2 = DB::table('tblCustPrivateIndividual')
	            ->select('tblCustPrivateIndividual.strCustPrivCPNumber')
	            ->where('tblCustPrivateIndividual.strCustPrivCPNumber','=', trim(Input::get('editCel')))
	            ->count();
	    }	

        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach ($ind as $ind) {
				if(!strcasecmp($ind->strCustPrivIndivID, Input::get('editIndiID')) == 0 &&
				   strcasecmp($ind->strCustPrivFName, trim(Input::get('editFName'))) == 0 && 
				   strcasecmp($ind->strCustPrivMName, trim(Input::get('editMName'))) == 0 && 
				   strcasecmp($ind->strCustPrivLName, trim(Input::get('editLName'))) == 0){
						$isAdded = TRUE;
					}			
				}	
        	}

		if(!$isAdded){
			$individual->strCustPrivFName = trim(Input::get('editFName'));
			$individual->strCustPrivMName = trim(Input::get('editMName'));	
			$individual->strCustPrivLName = trim(Input::get('editLName'));
			$individual->strCustPrivHouseNo = trim(Input::get('editCustPrivHouseNo'));
			$individual->strCustPrivStreet = trim(Input::get('editCustPrivStreet'));
			$individual->strCustPrivBarangay = trim(Input::get('editCustPrivBarangay'));
			$individual->strCustPrivCity = trim(Input::get('editCustPrivCity'));
			$individual->strCustPrivProvince = trim(Input::get('editCustPrivProvince'));
			$individual->strCustPrivZipCode = trim(Input::get('editCustPrivZipCode'));
			$individual->strCustPrivEmailAddress = trim(Input::get('editEmail'));			
			$individual->strCustPrivCPNumber = trim(Input::get('editCel'));
			$individual->strCustPrivCPNumberAlt = trim(Input::get('editCelAlt'));
			$individual->strCustPrivLandlineNumber = trim(Input::get('editPhone'));

			$individual->save();
			return Redirect::to('/maintenance/customerIndividual?successEdit=true');
	 	}else return Redirect::to('/maintenance/customerIndividual?successEdit=duplicate');

	}

	public function delCustPrivIndiv()
	{
		$id = Input::get('delIndivID');
		$isDeleted = FALSE;

		if(!$isDeleted){
		$individual = PrivateIndividual::find($id);

		$reason = ReasonIndividual::create(array(
			'strInactiveIndividualID' =>Input::get('delInactiveIndiv'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$individual->boolIsActive = 0;
		$reason->save();
		$individual->save();
		return Redirect::to('/maintenance/customerIndividual?successDel=true');
	 }else return Redirect::to('/maintenance/customerIndividual?successDel=false');
	}

	public function reactCustPrivIndiv()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;

		if(!$isAdded){
		$individual = PrivateIndividual::find($id);

		$reas = Input::get('reactInactiveIndiv');
		$reason = DB::table('tblReasonIndividual')
						->where('strInactiveIndividualID', '=', $reas)
						->delete();

		$individual->boolIsActive = 1;
		$individual->save();
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