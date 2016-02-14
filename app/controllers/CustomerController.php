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
		
		return View::make('customerIndividual')->with('individual', $individual)->with('newID', $newID);
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

		return View::make('customerCompany')->with('company', $company)->with('newID', $newID);
	}

	public function addCustPrivIndiv()
	{	

		$individual = PrivateIndividual::create(array(
			'strCustPrivIndivID' => Input::get('addIndiID'),
			'strCustFName' => Input::get('addFName'),		
			'strCustLName' => Input::get('addLName'),
			'strSex' => Input::get('addSex'),
			'strCustAddress' => Input::get('addAddress'),
			'strCustEmailAddress' => Input::get('addEmail'),			
			'strCustPhoneNumber' => Input::get('addCel'), 
			'strCustLandlineNumber' => Input::get('addPhone')
			));

		$individual->save();
		return Redirect::to('/customerIndividual');
	}

	public function editCustPrivIndiv()
	{
		$id = Input::get('editCustPrivIndivID');
		$individual = PrivateIndividual::find($id);

		$individual->strCustFName = Input::get('editFName');	
		$individual->strCustLName = Input::get('editLName');
		$individual->strSex = Input::get('editAddress');
		$individual->strCustAddress = Input::get('editAddress');
		$individual->strCustEmailAddress = Input::get('editEmail');			
		$individual->strCustPhoneNumber = Input::get('editCel');
		$individual->strCustLandlineNumber = Input::get('editPhone');

		$individual->save();
		return Redirect::to('/customerIndividual');
	}

	public function addCustCompany()
	{	

		$company = Company::create(array(
			'strCustCompanyID' => Input::get('addComID'),
			'strCustCompanyName' => Input::get('addComName'),		
			'strCustCompanyAddress' => Input::get('addAddress'),
			'strCustContactPerson' => Input::get('addConPerson'),
			'strCustCompanyEmailAddress' => Input::get('addComEmailAddress'),			
			'strCustCompanyCPNumber' => Input::get('addCel'), 
			'strCustCompanyTelNumber' => Input::get('addPhone'),
			'strCustCompanyFaxNumber' => Input::get('addFax'),
			'boolIsActive' => 1
			));

		$company->save();
		return Redirect::to('/customerCompany');
	}

	public function editcustCompany()
	{
		$id = Input::get('editComID');
		$company = Company::find($id);

		$company->strCustCompanyName = Input::get('editComName');	
		$company->strCustCompanyAddress = Input::get('editAddress');
		$company->strCustContactPerson = Input::get('editConPerson');
		$company->strCustCompanyEmailAddress = Input::get('editComEmailAddress');
		$company->strCustCompanyTelNumber = Input::get('editPhone');			
		$company->strCustCompanyCPNumber = Input::get('editCel');
		$company->strCustCompanyFaxNumber = Input::get('editFax');

		$company->save();
		return Redirect::to('/customerCompany');
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