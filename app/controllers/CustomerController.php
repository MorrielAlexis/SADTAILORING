<?php

class CustomerController extends BaseController{


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

		return View::make('customerIndividual')
					->with('individual', $individual)
					->with('individual2', $individual)
					->with('newID', $newID);
	}

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

		return View::make('customerCompany')
				->with('company', $company)
				->with('company2', $company)
				->with('newID', $newID);
	}

	public function addCustPrivIndiv()
	{
		$ind = PrivateIndividual::get();
		$isAdded = FALSE;

		foreach ($ind as $ind) {
			if(strcasecmp($ind->strCustPrivFName, Input::get('addFName') == 0) && 
			   strcasecmp($ind->strCustPrivMName, Input::get('addMName') == 0) && 
			   strcasecmp($ind->strCustPrivLName, Input::get('addLName') == 0) && 
			   strcasecmp($ind->strCustPrivAddress, Input::get('addAddress') == 0) && 
			   strcasecmp($ind->strCustPrivLandlineNumber, Input::get('addPhone') == 0) && 
			   strcasecmp($ind->strCustPrivCPNumber, Input::get('addCel') == 0) && 
			   strcasecmp($ind->strCustPrivCPNumberAlt, Input::get('addCelAlt') == 0) && 
			   strcasecmp($ind->strCustPrivEmailAddress, Input::get('addEmail') == 0))
					$isAdded = TRUE;
		}	


		if(!$isAdded){
			$individual = PrivateIndividual::create(array(
				'strCustPrivIndivID' => Input::get('addIndiID'),
				'strCustPrivFName' => Input::get('addFName'),		
				'strCustPrivMName' => Input::get('addMName'),
				'strCustPrivLName' => Input::get('addLName'),
				'strCustPrivAddress' => Input::get('addAddress'),
				'strCustPrivLandlineNumber' => Input::get('addPhone'),						
				'strCustPrivCPNumber' => Input::get('addCel'), 
				'strCustPrivCPNumberAlt' => Input::get('addCelAlt'),
				'strCustPrivEmailAddress' => Input::get('addEmail'),
				'boolIsActive' => 1
				));

			$individual->save();
			return Redirect::to('/maintenance/customerIndividual?success=true');
		}else return Redirect::to('/maintenance/customerIndividual?success=false');

		
	}

	public function editCustPrivIndiv()
	{	
		$id = Input::get('editIndiID');
		$individual = PrivateIndividual::find($id);

		$individual->strCustPrivFName = Input::get('editFName');
		$individual->strCustPrivMName = Input::get('editMName');	
		$individual->strCustPrivLName = Input::get('editLName');
		$individual->strCustPrivAddress = Input::get('editAddress');
		$individual->strCustPrivEmailAddress = Input::get('editEmail');			
		$individual->strCustPrivCPNumber = Input::get('editCel');
		$individual->strCustPrivCPNumberAlt = Input::get('editCelAlt');
		$individual->strCustPrivLandlineNumber = Input::get('editPhone');

		$individual->save();
		return Redirect::to('/customerIndividual');
	}

	public function delCustPrivIndiv()
	{
		$id = Input::get('delIndivID');
		$individual = PrivateIndividual::find($id);

		$individual->boolIsActive = 0;

		$individual->save();
		return Redirect::to('/customerIndividual');
	}

	public function reactCustPrivIndiv()
	{
		$id = Input::get('reactID');
		$individual = PrivateIndividual::find($id);

		$individual->boolIsActive = 1;

		$individual->save();
		return Redirect::to('/customerIndividual');
	}

	public function addCustCompany()
	{	
		$comp = Company::get();
		$isAdded = FALSE;

		foreach ($comp as $comp) {
			if(strcasecmp($comp->strCustCompanyName, Input::get('addComName') == 0) && 
			   strcasecmp($comp->strCustCompanyAddress, Input::get('addAddress') == 0) && 
			   strcasecmp($comp->strCustContactPerson, Input::get('addConPerson') == 0) && 
			   strcasecmp($comp->strCustCompanyEmailAddress, Input::get('addComEmailAddress') == 0) && 
			   strcasecmp($comp->strCustCompanyCPNumber, Input::get('addCel') == 0) && 
			   strcasecmp($comp->strCustCompanyCPNumberAlt, Input::get('addCelAlt') == 0) && 
			   strcasecmp($comp->strCustCompanyTelNumber, Input::get('addPhone') == 0) &&
			   strcasecmp($comp->strCustCompanyFaxNumber, Input::get('addFax') == 0))
					$isAdded = TRUE;
			}	


		if(!$isAdded){
			$company = Company::create(array(
				'strCustCompanyID' => Input::get('addComID'),
				'strCustCompanyName' => Input::get('addComName'),		
				'strCustCompanyAddress' => Input::get('addAddress'),
				'strCustContactPerson' => Input::get('addConPerson'),
				'strCustCompanyEmailAddress' => Input::get('addComEmailAddress'),			
				'strCustCompanyCPNumber' => Input::get('addCel'), 
				'strCustCompanyCPNumberAlt' => Input::get('addCelAlt'), 
				'strCustCompanyTelNumber' => Input::get('addPhone'),
				'strCustCompanyFaxNumber' => Input::get('addFax'),
				'boolIsActive' => 1
				));

			$company->save();
		}

		return Redirect::to('/maintenance/customerCompany');
	}

	public function editCustCompany()
	{
		$id = Input::get('editComID');
		$company = Company::find($id);

		$company->strCustCompanyName = Input::get('editComName');	
		$company->strCustCompanyAddress = Input::get('editAddress');
		$company->strCustContactPerson = Input::get('editConPerson');
		$company->strCustCompanyEmailAddress = Input::get('editComEmailAddress');
		$company->strCustCompanyTelNumber = Input::get('editPhone');			
		$company->strCustCompanyCPNumber = Input::get('editCel');
		$company->strCustCompanyCPNumberAlt = Input::get('editCelAlt');
		$company->strCustCompanyFaxNumber = Input::get('editFax');

		$company->save();
		return Redirect::to('/maintenance/customerCompany');
	}

	public function delCustCompany()
	{
		$id = Input::get('delCompanyID');
		$company = Company::find($id);

		$company->boolIsActive = 0;

		$company->save();
		return Redirect::to('/maintenance/customerCompany');
	}

	public function reactCustCompany()
	{
		$id = Input::get('reactID');
		$company = Company::find($id);

		$company->boolIsActive = 1;

		$company->save();
		return Redirect::to('/maintenance/customerCompany');
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