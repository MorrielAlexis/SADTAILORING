<?php

class CustomerCompanyController extends BaseController{


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
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\'\.\,]+$/";
		$regexName = "/^[a-zA-Z\s\-\']+$/";
		$regexHouse = "/^[0-9]+$/";
		$regexStreet = "/^[a-zA-Z0-9\'\-\s\.]+$/";
		$regexBarangay = "/^[a-zA-Z0-9\-\s]+$/";
		$regexCity = "/^[a-zA-Z\'\-\s]+$/";

		$regexZip = "/^[0-9]+$/";
		$regexProvince = "/^[a-zA-Z\'\-\s\.]+$/";

		if(!trim(Input::get('addComName')) == '' && !trim(Input::get('addConPerson')) == '' && 
		   !trim(Input::get('addCustCompanyHouseNo')) == '' && !trim(Input::get('addComEmailAddress')) == '' &&
		   !trim(Input::get('addCustCompanyStreet')) == '' && !trim(Input::get('addCustCompanyCity')) == '' && 
		   !trim(Input::get('addCel')) == ''){
				$validInput = TRUE;

					if (preg_match($regex, Input::get('addComName')) && preg_match($regexName, Input::get('addConPerson')) && 
					    preg_match($regexHouse, Input::get('addCustCompanyHouseNo')) && !!filter_var(Input::get('addComEmailAddress'), FILTER_VALIDATE_EMAIL) &&
					    preg_match($regexStreet, Input::get('addCustCompanyStreet')) && preg_match($regexCity, Input::get('addCustCompanyCity'))){
							$validInput = TRUE;
								if(!trim(Input::get('addCustCompanyZipCode')) == '' || !trim(Input::get('addCustCompanyProvince')) == ''){
									if (preg_match($regexZip, Input::get('addCustCompanyZipCode')) || preg_match($regexProvince, Input::get('addCustCompanyProvince')) ||
										preg_match($regexBarangay, Input::get('addCustCompanyBarangay'))){
										$validInput = TRUE;
									}else $validInput = FALSE;
								}
					}else $validInput = FALSE;
		}else $validInput = FALSE;

		$count = DB::table('tblCustCompany')
            ->select('tblCustCompany.strCustCompanyEmailAddress')
            ->where('tblCustCompany.strCustCompanyEmailAddress','=', trim(Input::get('addComEmailAddress')))
            ->count();

        $count2 = DB::table('tblCustCompany')
            ->select('tblCustCompany.strCustCompanyCPNumber')
            ->where('tblCustCompany.strCustCompanyCPNumber','=', trim(Input::get('addCel')))
            ->count();

        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach ($comp as $comp) {
				if(strcasecmp($comp->strCustCompanyName, trim(Input::get('addComName'))) == 0 || 
				   strcasecmp($comp->strCustContactPerson, trim(Input::get('addConPerson'))) == 0){
						$isAdded = TRUE;
				}				
			}	
        }
		
		if($validInput){
			if(!$isAdded){
				$company = Company::create(array(
					'strCustCompanyID' => Input::get('addComID'),
					'strCustCompanyName' => trim(Input::get('addComName')),		
					'strCustCompanyHouseNo' => trim(Input::get('addCustCompanyHouseNo')),	
					'strCustCompanyStreet' => trim(Input::get('addCustCompanyStreet')),
					'strCustCompanyBarangay' => trim(Input::get('addCustCompanyBarangay')),	
					'strCustPrivCity' => trim(Input::get('addCustCompanyCity')),	
					'strCustCompanyProvince' => trim(Input::get('addCustCompanyProvince')),
					'strCustCompanyZipCode' => trim(Input::get('addCustCompanyZipCode')),
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
		}else return Redirect::to('/maintenance/customerCompany?input=invalid');
	} 

	public function editCustCompany()
	{
		$id = Input::get('editComID');
		$company = Company::find($id);

		$comp = Company::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\'\.\,]+$/";
		$regexName = "/^[a-zA-Z\s\-\']+$/";
		$regexHouse = "/^[0-9]+$/";
		$regexStreet = "/^[a-zA-Z0-9\'\-\s\.]+$/";
		$regexBarangay = "/^[a-zA-Z0-9\-\s]+$/";
		$regexCity = "/^[a-zA-Z\'\-\s]+$/";

		if(!trim(Input::get('editComName')) == '' && !trim(Input::get('editConPerson')) == '' && 
		   !trim(Input::get('editCustCompanyHouseNo')) == '' && !trim(Input::get('editComEmailAddress')) == '' &&
		   !trim(Input::get('editCustCompanyStreet')) == '' && !trim(Input::get('editCustCompanyBarangay')) == '' &&
		   !trim(Input::get('editCustCompanyCity')) == '' && !trim(Input::get('editCel')) == ''){
				$validInput = TRUE;

					if (preg_match($regex, Input::get('editComName')) && preg_match($regexName, Input::get('editConPerson')) && 
					    preg_match($regexHouse, Input::get('editCustCompanyHouseNo')) && !!filter_var(Input::get('editComEmailAddress'), FILTER_VALIDATE_EMAIL) &&
					    preg_match($regexStreet, Input::get('editCustCompanyStreet')) && preg_match($regexBarangay, Input::get('editCustCompanyBarangay')) &&
					    preg_match($regexCity, Input::get('editCustCompanyCity'))){
							$validInput = TRUE;
					}else $validInput = FALSE;
		}else $validInput = FALSE;

		$count = 0; $count2 = 0;

		if(!($company->strCustCompanyEmailAddress == trim(Input::get('editComEmailAddress')))){
			$count = DB::table('tblCustCompany')
	            ->select('tblCustCompany.strCustCompanyEmailAddress')
	            ->where('tblCustCompany.strCustCompanyEmailAddress','=', trim(Input::get('editComEmailAddress')))
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
				   strcasecmp($comp->strCustContactPerson, trim(Input::get('editConPerson'))) == 0){
						$isAdded = TRUE;
				}				
			}	
        }
		
		if($validInput){	
			if(!$isAdded){
				$company = Company::find($id);

				$company->strCustCompanyName = trim(Input::get('editComName'));	
				$company->strCustCompanyHouseNo = trim(Input::get('editCustCompanyHouseNo'));
				$company->strCustCompanyStreet = trim(Input::get('editCustCompanyStreet'));
				$company->strCustCompanyBarangay = trim(Input::get('editCustCompanyBarangay'));
				$company->strCustCompanyCity = trim(Input::get('editCustCompanyCity'));
				$company->strCustCompanyProvince = trim(Input::get('editCustCompanyProvince'));
				$company->strCustCompanyZipCode = trim(Input::get('editCustCompanyZipCode'));
				$company->strCustContactPerson = trim(Input::get('editConPerson'));
				$company->strCustCompanyEmailAddress = trim(Input::get('editComEmailAddress'));
				$company->strCustCompanyTelNumber = trim(Input::get('editPhone'));			
				$company->strCustCompanyCPNumber = trim(Input::get('editCel'));
				$company->strCustCompanyCPNumberAlt = trim(Input::get('editCelAlt'));
				$company->strCustCompanyFaxNumber = trim(Input::get('editFax'));

				$company->save();
				return Redirect::to('/maintenance/customerCompany?successEdit=true');
		 	}else return Redirect::to('/maintenance/customerCompany?successEdit=duplicate');
		}else return Redirect::to('/maintenance/customerCompany?input=invalid');
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