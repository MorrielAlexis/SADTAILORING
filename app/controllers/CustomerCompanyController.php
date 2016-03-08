<?php

class CustomerController extends BaseController{


	public function company()
	{
		$ids = DB::table('tblCustCompany')
			->select('strCustCompanyID')
			->orderBy('created_at', 'desc')
			->orderBy('strCustCompanyID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strCustCompanyID;
		$newID = $this->smartCounter($ID);		
		
		$company = Company::all();
		$reason = ReasonCompany::all();

		$company = DB::table('tblCustCompany')
				->leftJoin('tblReasonCompany', 'tblCustCompany.strCustCompanyID', '=', 'tblReasonCompany.strInactiveCompanyID')
				->select('tblCustCompany.*', 'tblReasonCompany.strInactiveCompanyID', 'tblReasonCompany.strInactiveReason')
				->orderBy('created_at')
				->get();

		return View::make('customerCompany')
				->with('company', $company)
				->with('reason', $reason)
				->with('newID', $newID);
	}

	public function addCustCompany()
	{	
		$comp = Company::get();
		$isAdded = FALSE;

		$count = DB::table('tblCustCompany')
            ->select('tblCustCompany.strCustCompanyEmailAddress')
            ->where('tblCustCompany.strCustCompanyEmailAddress','=', trim(Input::get('addComEmailAddress'))
            ->count();

        $count2 = DB::table('tblCustCompany')
            ->select('tblCustCompany.strCustCompanyCPNumber')
            ->where('tblCustCompany.strCustCompanyCPNumber','=', trim(Input::get('addCel'))
            ->count();

        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach ($comp as $comp) {
				if(strcasecmp($comp->strCustCompanyName, trim(Input::get('addComName'))) == 0 && 
				   strcasecmp($comp->strCustCompanyAddress, trim(Input::get('addAddress'))) == 0 && 
				   strcasecmp($comp->strCustContactPerson, trim(Input::get('addConPerson'))) == 0){
						$isAdded = TRUE;
				}				
			}	
        }
			
		if(!$isAdded){
			$company = Company::create(array(
				'strCustCompanyID' => Input::get('addComID')),
				'strCustCompanyName' => trim(Input::get('addComName')),		
				'strCustCompanyAddress' => trim(Input::get('addAddress')),
				'strCustContactPerson' => trim(Input::get('addConPerson')),
				'strCustCompanyEmailAddress' => trim(Input::get('addComEmailAddress')),			
				'strCustCompanyCPNumber' => trim(Input::get('addCel')), 
				'strCustCompanyCPNumberAlt' => trim(Input::get('addCelAlt')), 
				'strCustCompanyTelNumber' => trim(Input::get('addPhone')),
				'strCustCompanyFaxNumber' => trim(Input::get('addFax')),
				'boolIsActive' => 1
				));

			$company->save();
			return Redirect::to('/maintenance/customerCompany?success=true');
		}else return Redirect::to('/maintenance/customerCompany?success=duplicate');
	} 

	public function editCustCompany()
	{
		$id = Input::get('editComID');
		$company = Company::find($id);

		$comp = Company::get();
		$isAdded = FALSE;

		$count = 0; $count2 = 0;

		if(!($company->strCustCompanyEmailAddress == trim(Input::get('editComEmailAddress'))){
			$count = DB::table('tblCustCompany')
	            ->select('tblCustCompany.strCustCompanyEmailAddress')
	            ->where('tblCustCompany.strCustCompanyEmailAddress','=', trim(Input::get('editComEmailAddress'))
	            ->count();
	    }

	    if(!($company->strCustCompanyCPNumber == trim(Input::get('editCel')))){
	        $count2 = DB::table('tblCustCompany')
	            ->select('tblCustCompany.strCustCompanyCPNumber')
	            ->where('tblCustCompany.strCustCompanyCPNumber','=', trim(Input::get('editCel')))
	            ->count();
	    }

        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach ($comp as $comp) {
				if(!strcasecmp($comp->strCustCompanyID, trim(Input::get('editComID'))) == 0 &&
				   strcasecmp($comp->strCustCompanyName, trim(Input::get('editComName'))) == 0 && 
				   strcasecmp($comp->strCustCompanyAddress, trim(Input::get('editAddress'))) == 0 && 
				   strcasecmp($comp->strCustContactPerson, trim(Input::get('editConPerson'))) == 0){
						$isAdded = TRUE;
				}				
			}	
        }
			
		if(!$isAdded){
			$company = Company::find($id);

			$company->strCustCompanyName = trim(Input::get('editComName'));	
			$company->strCustCompanyAddress = trim(Input::get('editAddress'));
			$company->strCustContactPerson = trim(Input::get('editConPerson'));
			$company->strCustCompanyEmailAddress = trim(Input::get('editComEmailAddress'));
			$company->strCustCompanyTelNumber = trim(Input::get('editPhone'));			
			$company->strCustCompanyCPNumber = trim(Input::get('editCel'));
			$company->strCustCompanyCPNumberAlt = trim(Input::get('editCelAlt'));
			$company->strCustCompanyFaxNumber = trim(Input::get('editFax'));

			$company->save();
			return Redirect::to('/maintenance/customerCompany?successEdit=true');
	 	}else return Redirect::to('/maintenance/customerCompany?successEdit=duplicate');
	}

	public function delCustCompany()
	{
		$id = Input::get('delCompanyID');
		$isDeleted = FALSE;


		if(!$isDeleted){
		$company = Company::find($id);

		$reason = ReasonCompany::create(array(
			'strInactiveCompanyID' =>Input::get('delInactiveComp'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$company->boolIsActive = 0;
		$reason->save();
		$company->save();
		return Redirect::to('/maintenance/customerCompany?successDel=true');
	 }else return Redirect::to('/maintenance/customerCompany?successDel=false');
	}

	public function reactCustCompany()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


		if(!$isAdded){
		$company = Company::find($id);

		$reas = Input::get('reactInactiveComp');
		$reason = DB::table('tblReasonCompany')
						->where('strInactiveCompanyID', '=', $reas)
						->delete();

		$company->boolIsActive = 1;

		$company->save();
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