<?php

class AdminWalkController extends BaseController{

	public function walk(){

		$ids = DB::table('tblCustPrivateIndividual')
			->select('strCustPrivIndivID')
			->orderBy('created_at', 'desc')
			->orderBy('strCustPrivIndivID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strCustPrivIndivID;
		$indID = $this->smartCounter($ID);	
		///////////////////////////////		

		$ids = DB::table('tblCustCompany')
			->select('strCustCompanyID')
			->orderBy('created_at', 'desc')
			->orderBy('strCustCompanyID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strCustCompanyID;
		$compID = $this->smartCounter($ID);	

		return View::make('adminWalk')
					->with('indID', $indID)
					->with('compID', $compID);
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

				$custID = Input::get('addIndiID');

				return Redirect::to('/madeOrder?id=' . $custID);
			}else return Redirect::to('/transaction/walk');
		
	}

	public function addCustCompany()
	{	
		$comp = Company::get();
		$isAdded = FALSE;

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
		
			if(!$isAdded){
				$company = Company::create(array(
					'strCustCompanyID' => Input::get('addComID'),
					'strCustCompanyName' => trim(Input::get('addComName')),		
					'strCustCompanyHouseNo' => trim(Input::get('addCustCompanyHouseNo')),	
					'strCustCompanyStreet' => trim(Input::get('addCustCompanyStreet')),
					'strCustCompanyBarangay' => trim(Input::get('addCustCompanyBarangay')),	
					'strCustCompanyCity' => trim(Input::get('addCustCompanyCity')),	
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
				return Redirect::to('/madeOrder');
			}else return Redirect::to('/transaction/walk');
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