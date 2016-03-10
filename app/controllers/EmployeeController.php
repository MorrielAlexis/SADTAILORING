<?php

class EmployeeController extends BaseController{
	

	public function employee()
	{	
		$ids = DB::table('tblEmployee')
			->select('strEmployeeID')
			->orderBy('created_at', 'desc')
			->orderBy('strEmployeeID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strEmployeeID;
		$newID = $this->smartCounter($ID);	

		$roles =  DB::table('tblEmployeeRole')
					->select('strEmpRoleID', 'strEmpRoleName', 'boolIsActive')
					->get();

		$reason = ReasonEmployee::all();

		$employee = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->leftJoin('tblReasonEmployee', 'tblEmployee.strEmployeeID', '=', 'tblReasonEmployee.strInactiveEmployeeID')
            ->select('tblEmployee.*', 'tblEmployeeRole.strEmpRoleName', 'tblReasonEmployee.strInactiveEmployeeID', 'tblReasonEmployee.strInactiveReason')
            ->get();

		return View::make('employee')
					->with('employee', $employee)
					->with('roles', $roles)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function addEmployee()
	{	
		$emp = Employee::get();
		$isAdded = FALSE;

		$count = DB::table('tblEmployee')
            ->select('tblEmployee.strEmailAdd')
            ->where('tblEmployee.strEmailAdd','=', trim(Input::get('addEmail')))
            ->count();

        $count2 = DB::table('tblEmployee')
            ->select('tblEmployee.strCellNo')
            ->where('tblEmployee.strCellNo','=', trim(Input::get('addCellNo')))
            ->count();
            
        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach($emp as $emp){
			if(strcasecmp($emp->strEmpFName, trim(Input::get('addFirstName'))) == 0 &&
				    strcasecmp($emp->strEmpMName, trim(Input::get('addMiddleName'))) == 0 &&
					strcasecmp($emp->strEmpLName, trim(Input::get('addLastName'))) == 0){
						$isAdded = TRUE;
				}
			}
        }

		if(!$isAdded){
			$employee = Employee::create(array(
				'strEmployeeID' => Input::get('addEmpID'),
				'strEmpFName' => trim(Input::get('addFirstName')),	
				'strEmpMName' => trim(Input::get('addMiddleName')),	
				'strEmpLName' => trim(Input::get('addLastName')),
				'dtEmpBday' => date("Y-m-d", strtotime(Input::get("adddtEmpBday"))),
				'strSex' => Input::get('addSex'),
				'strEmpHouseNo' => trim(Input::get('addEmpHouseNo')),	
				'strEmpStreet' => trim(Input::get('addEmpStreet')),
				'strEmpBarangay' => trim(Input::get('addEmpBarangay')),	
				'strEmpCity' => trim(Input::get('addEmpCity')),	
				'strEmpProvince' => trim(Input::get('addEmpProvince')),
				'strEmpZipCode' => trim(Input::get('addEmpZipCode')),
				'strRole' => Input::get('addRoles'), 
				'strCellNo' => trim(Input::get('addCellNo')),
				'strCellNoAlt' => trim(Input::get('addCellNoAlt')),
				'strPhoneNo' => trim(Input::get('addPhoneNo')),
				'strEmailAdd' => trim(Input::get('addEmail')),
				'boolIsActive' => 1
			));

			$employee->save();
			return Redirect::to('/maintenance/employee?success=true');
		} else return Redirect::to('/maintenance/employee?success=duplicate');
	}

	public function editEmployee()
	{
		$id = Input::get('editEmpID');
		$employee = Employee::find($id);

		$emp = Employee::get();
		$isAdded = FALSE;

		$count = 0; $count2 = 0;

		if(!($employee->strEmailAdd == trim(Input::get('editEmail')))) {	
			$count = DB::table('tblEmployee')
	            ->select('tblEmployee.strEmailAdd')
	            ->where('tblEmployee.strEmailAdd','=', trim(Input::get('editEmail')))
	            ->count();
        }

        if(!($employee->strCellNo == trim(Input::get('editCellNo')))) {	
	        $count2 = DB::table('tblEmployee')
	            ->select('tblEmployee.strCellNo')
	            ->where('tblEmployee.strCellNo','=', trim(Input::get('editCellNo')))
	            ->count();
	    }
            
        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach($emp as $emp){
			if(!strcasecmp($emp->strEmployeeID, Input::get('editEmpID')) == 0 &&
				strcasecmp($emp->strEmpFName, trim(Input::get('editFirstName'))) == 0 &&
			    strcasecmp($emp->strEmpMName, trim(Input::get('editMiddleName'))) == 0 &&
				strcasecmp($emp->strEmpLName, trim(Input::get('editLastName'))) == 0){
						$isAdded = TRUE;
				}
			}
        }

		if(!$isAdded){
			$employee = Employee::find($id);

			$employee->strEmpFName = trim(Input::get('editFirstName'));	
			$employee->strEmpLName = trim(Input::get('editLastName'));	
			$employee->strEmpMName = trim(Input::get('editMiddleName'));	
			$employee->dtEmpBday = date("Y-m-d", strtotime(Input::get("editdtEmpBday")));
			$employee->strSex = Input::get('editSex');
			$employee->strEmpHouseNo = trim(Input::get('editEmpHouseNo'));
			$employee->strEmpStreet = trim(Input::get('editEmpStreet'));
			$employee->strEmpBarangay = trim(Input::get('editEmpBarangay'));
			$employee->strEmpCity = trim(Input::get('editEmpCity'));
			$employee->strEmpProvince = trim(Input::get('editEmpProvince'));
			$employee->strEmpZipCode = trim(Input::get('editEmpZipCode'));
			$employee->strRole = Input::get('editRoles');
			$employee->strCellNo = trim(Input::get('editCellNo'));
			$employee->strCellNoAlt = trim(Input::get('editCellNoAlt'));
			$employee->strPhoneNo = trim(Input::get('editPhoneNo'));
			$employee->strEmailAdd = trim(Input::get('editEmail'));

			$employee->save();
			return Redirect::to('/maintenance/employee?successEdit=true');
		 } else return Redirect::to('/maintenance/employee?success=duplicate');
	}

	public function delEmployee()
	{
		$id = Input::get('delEmpID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$employee = Employee::find($id);

		$reason = ReasonEmployee::create(array(
			'strInactiveEmployeeID' => Input::get('delInactiveEmp'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$employee->boolIsActive = 0;
		$reason->save();
		$employee->save();
		return Redirect::to('/maintenance/employee?successDel=true');
	 } else return Redirect::to('/maintenance/employeeRole?success=beingUsed');
	}

	public function reactEmployee()
	{	
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$employee = Employee::find($id);

		$reas = Input::get('reactInactiveEmp');
		$reason = DB::table('tblReasonEmployee')
						->where('strInactiveEmployeeID', '=', $reas)
						->delete();

		$employee->boolIsActive = 1;

		$employee->save();
		return Redirect::to('/utilities/inactiveData?successRec=true');
	 } else return Redirect::to('/utilities/inactiveData?successRec=false');
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