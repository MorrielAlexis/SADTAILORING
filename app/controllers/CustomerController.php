<?php

class CustomerController extends BaseController{


	public function individual()
	{
		$ids = DB::table('tblCustPrivateIndividual')
			->select('strCustPrivIndivID')
			->orderBy('created_at', 'desc')
			->orderBy('strCustCompanyID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strCustPrivIndivID;
		$newID = $this->smartCounter($ID);	

		$privateindividual = PrivateIndividual::all();
		
		return View::make('customerIndividual')->with('privindiv', $privindiv)->with('newID', $newID);
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

		return View::make('customerCOmpany')->with('company', $company)->with('newID', $newID);
	}

	public function addCustPrivIndiv()
	{	

		$privindiv = PrivateIndividual::create(array(
			'strCustPrivIndivID' => Input::get('addIndiID'),
			'strCustFName' => Input::get('addFName'),		
			'strCustLName' => Input::get('addLName'),
			'strSex' => Input::get('addSex'),
			'strCustAddress' => Input::get('addAddress'),
			'strCustEmailAddress' => Input::get('addEmail'),			
			'strCustPhoneNumber' => Input::get('addCel'), 
			'strCustLandlineNumber' => Input::get('addPhone')
			));

		$privindiv->save();
		return Redirect::to('/customerIndividual');
	}

	public function editCustPrivIndiv()
	{
		$id = Input::get('editCustPrivIndivID');
		$privindiv = PrivateIndividual::find($id);

		$privindiv->strCustFName = Input::get('editFName');	
		$privindiv->strCustLName = Input::get('editLName');
		$privindiv->strSex = Input::get('editAddress');
		$privindiv->strCustAddress = Input::get('editAddress');
		$privindiv->strCustEmailAddress = Input::get('editEmail');			
		$privindiv->strCustPhoneNumber = Input::get('editCel');
		$privindiv->strCustLandlineNumber = Input::get('editPhone');

		$privindiv->save();
		return Redirect::to('/customerIndividual');
	}

	public function addCustCompany()
	{	

		$company = Company::create(array(
			'strCustCompanyID' => Input::get('addEmpID'),
			'strCustCompanyName' => Input::get('addFirstName'),		
			'strCustCompanyAddress' => Input::get('addLastName'),
			'strCustContactPerson' => Input::get('addAge'),
			'strCustCompanyEmailAddress' => Input::get('addSex'),
			'strCustCompanyTelNumber' => Input::get('addAddress'),			
			'strCustCompanyCPNumber' => Input::get('addRoles'), 
			'strCustCompanyFaxNumber' => Input::get('addCellNo'),
			'boolIsActive' => 1
			));

		$company->save();
		return Redirect::to('/customerCompany');
	}

	public function editcustCompany()
	{
		$id = Input::get('editCustCompanyID');
		$company = Company::find($id);

		$company->strCustCompanyName = Input::get('addFirstName');	
		$company->strCustCompanyAddress = Input::get('addLastName');
		$company->strCustContactPerson = Input::get('addAge');
		$company->strCustCompanyEmailAddress = Input::get('addSex');
		$company->strCustCompanyTelNumber = Input::get('addAddress');			
		$company->strCustCompanyCPNumber = Input::get('addRoles');
		$company->strCustCompanyFaxNumber = Input::get('addCellNo');

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