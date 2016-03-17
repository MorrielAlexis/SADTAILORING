<?php

class WalkIndiController extends BaseController{


	public function indi()
	{
		$ids = DB::table('tblCustPrivateIndividual')
			->select('strCustPrivIndivID')
			->orderBy('created_at', 'desc')
			->orderBy('strCustPrivIndivID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strCustPrivIndivID;
		$newID = $this->smartCounter($ID);	

		return View::make('walkIndi')
					->with('newID', $newID);
	}

	public function addCustPrivIndiv()
	{
		$ind = PrivateIndividual::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\'\-\.]+( [a-zA-Z\'\-\.]+)*$/";
		$regexHouse = "/[0-9a-zA-Z\-\s]+$/";
		$regexStreet = "/^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/";
		$regexBarangay = "/^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/";
		$regexCity = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";

		$regexZip = "/^[0-9]+$/";
		$regexProvince = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";

		if(!trim(Input::get('addFName')) == '' && !trim(Input::get('addLName')) == '' && 
		   !trim(Input::get('addCustPrivHouseNo')) == '' && !trim(Input::get('addEmail')) == '' &&
		   !trim(Input::get('addCustPrivStreet')) == '' && !trim(Input::get('addCustPrivCity')) == '' && 
		   !trim(Input::get('addCel')) == ''){
				$validInput = TRUE;
					if (preg_match($regex, Input::get('addFName')) && preg_match($regex, Input::get('addLName')) &&
						preg_match($regexStreet, Input::get('addCustPrivStreet')) && !!filter_var(Input::get('addEmail'), FILTER_VALIDATE_EMAIL) &&
						preg_match($regexHouse, Input::get('addCustPrivHouseNo')) && preg_match($regexCity, Input::get('addCustPrivCity'))) {
							$validInput = TRUE;
								if(!trim(Input::get('addCustPrivZipCode')) == '' || !trim(Input::get('addCustPrivProvince')) == '' || !trim(Input::get('addCustPrivBarangay')) == '') {
									if (preg_match($regexZip, Input::get('addCustPrivZipCode')) || preg_match($regexProvince, Input::get('addCustPrivProvince')) || 
										preg_match($regexBarangay, (Input::get('addCustPrivBarangay')))){
										$validInput = TRUE;
									}else $validInput = FALSE;
								}
					}else $validInput = FALSE;
		}else $validInput = FALSE;

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

        if($validInput){
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
				return Redirect::to('/maintenance/walkIndi?success=true');
			}else return Redirect::to('/maintenance/walkIndi?success=duplicate');
		}else return Redirect::to('/maintenance/walkIndi?input=invalid');
		
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