<?php

class EmployeeController extends BaseController{
	

	public function empProfile()
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
					->with('employee2', $employee)
					->with('roles2', $roles)
					->with('roles', $roles)
					->with('reason', $reason)
					->with('newID', $newID);
	}

	public function roles()
	{	
		$ids = DB::table('tblEmployeeRole')
			->select('strEmpRoleID')
			->orderBy('created_at', 'desc')
			->orderBy('strEmpRoleID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strEmpRoleID;
		$newID = $this->smartCounter($ID);	

		$role = Role::all();
		$reason = ReasonRole::all();

		$role = DB::table('tblEmployeeRole')
				->leftJoin('tblReasonRole', 'tblEmployeeRole.strEmpRoleID', '=', 'tblReasonRole.strInactiveRoleID')
				->select('tblEmployeeRole.*', 'tblReasonRole.strInactiveRoleID', 'tblReasonRole.strInactiveReason')
				->orderBy('created_at')
				->get();

		return View::make('employeeRole')
				->with('role', $role)
				->with('role2', $role)
				->with('reason', $reason)
				->with('newID', $newID);	
	}

	public function addEmployee()
	{	
		$emp = Employee::get();
		$isAdded = FALSE;

		$count = DB::table('tblEmployee')
            ->select('tblEmployee.strEmailAdd')
            ->where('tblEmployee.strEmailAdd','=', Input::get('addEmail'))
            ->count();

        $count2 = DB::table('tblEmployee')
            ->select('tblEmployee.strCellNo')
            ->where('tblEmployee.strCellNo','=', Input::get('addCellNo'))
            ->count();
            
        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach($emp as $emp){
			if(strcasecmp($emp->strEmpFName, Input::get('addFirstName')) == 0 &&
				    strcasecmp($emp->strEmpMName, Input::get('addMiddleName')) == 0 &&
					strcasecmp($emp->strEmpLName, Input::get('addLastName')) == 0){
						$isAdded = TRUE;
				}
			}
        }

		if(!$isAdded){
			$employee = Employee::create(array(
				'strEmployeeID' => Input::get('addEmpID'),
				'strEmpFName' => Input::get('addFirstName'),	
				'strEmpMName' => Input::get('addMiddleName'),	
				'strEmpLName' => Input::get('addLastName'),
				'dtEmpBday' => date("Y-m-d", strtotime(Input::get("adddtEmpBday"))),
				'strSex' => Input::get('addSex'),
				'strEmpAddress' => Input::get('addAddress'),			
				'strRole' => Input::get('addRoles'), 
				'strCellNo' => Input::get('addCellNo'),
				'strCellNoAlt' => Input::get('addCellNoAlt'),
				'strPhoneNo' => Input::get('addPhoneNo'),
				'strEmailAdd' => Input::get('addEmail'),
				'boolIsActive' => 1
			));

			$employee->save();
			return Redirect::to('/maintenance/employee?success=true');
		} else return Redirect::to('/maintenance/employee?success=duplicate');
	}

	public function addRole()
	{	
		$rol = Role::all();
		$isAdded = FALSE;

		foreach ($rol as $rol)
			if(strcasecmp($rol->strEmpRoleName, Input::get('addRoleName')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$role = Role::create(array(
			'strEmpRoleID' => Input::get('addRoleID'),
			'strEmpRoleName' => Input::get('addRoleName'),
			'strEmpRoleDesc' => Input::get('addRoleDescription'),
			'boolIsActive' => 1
			));

			$role->save();
			return Redirect::to('/maintenance/employeeRole?success=true');
		}else return Redirect::to('/maintenance/employeeRole?success=duplicate');
	}

	public function editEmployee()
	{
		$id = Input::get('editEmpID');
		$employee = Employee::find($id);

		$emp = Employee::get();
		$isAdded = FALSE;

		$count = 0; $count2 = 0;

		if(!($employee->strEmailAdd == Input::get('editEmail'))){	
			$count = DB::table('tblEmployee')
	            ->select('tblEmployee.strEmailAdd')
	            ->where('tblEmployee.strEmailAdd','=', Input::get('editEmail'))
	            ->count();
        }

        if(!($employee->strCellNo == Input::get('editCellNo'))){	
	        $count2 = DB::table('tblEmployee')
	            ->select('tblEmployee.strCellNo')
	            ->where('tblEmployee.strCellNo','=', Input::get('editCellNo'))
	            ->count();
	    }
            
        if($count > 0 || $count2 > 0){
        	$isAdded = TRUE;
        }else{
        	foreach($emp as $emp){
			if(!strcasecmp($emp->strEmployeeID, Input::get('editEmpID')) == 0 &&
				strcasecmp($emp->strEmpFName, Input::get('editFirstName')) == 0 &&
			    strcasecmp($emp->strEmpMName, Input::get('editMiddleName')) == 0 &&
				strcasecmp($emp->strEmpLName, Input::get('editLastName')) == 0){
						$isAdded = TRUE;
				}
			}
        }

		if(!$isAdded){
			$employee = Employee::find($id);

			$employee->strEmpFName = Input::get('editFirstName');	
			$employee->strEmpLName = Input::get('editLastName');	
			$employee->strEmpMName = Input::get('editMiddleName');	
			$employee->dtEmpBday = Input::get('editdtEmpBday');
			$employee->dtEmpBday = date("Y-m-d", strtotime(Input::get("editdtEmpBday")));
			$employee->strSex = Input::get('editSex');
			$employee->strEmpAddress = Input::get('editAddress');
			$employee->strRole = Input::get('editRoles');
			$employee->strCellNo = Input::get('editCellNo');
			$employee->strCellNoAlt = Input::get('editCellNoAlt');
			$employee->strPhoneNo = Input::get('editPhoneNo');
			$employee->strEmailAdd = Input::get('editEmail');

			$employee->save();
			return Redirect::to('/maintenance/employee?successEdit=true');
		 } else return Redirect::to('/maintenance/employee?success=duplicate');
	}

	public function editRole()
	{
		$id = Input::get('editRoleID');
		$role = Role::find($id);

		$rol = Role::all();
		$isAdded = FALSE;

		foreach ($rol as $rol)
			if(!strcasecmp($rol->strEmpRoleID, Input::get('editRoleID')) == 0 &&
				strcasecmp($rol->strEmpRoleName, Input::get('editRoleName')) == 0)
					$isAdded = TRUE;

		if(!$isAdded){
			$role->strEmpRoleName = Input::get('editRoleName');	
			$role->strEmpRoleDesc = Input::get('editRoleDescription');

			$role->save();
			return Redirect::to('/maintenance/employeeRole?successEdit=true');
		}else return Redirect::to('/maintenance/employeeRole?success=duplicate');

		
	 
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
	 } else return Redirect::to('/maintenance/employee?successDel=false');
	}

	public function delRole()
	{
		$id = Input::get('delRoleID');

		$role = Role::find($id);

		$count = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->select('tblEmployeeRole.*')
            ->where('tblEmployeeRole.strEmpRoleID','=', $id)
            ->count();

        if ($count == 0) {

			$reason = ReasonRole::create(array(
				'strInactiveRoleID' => Input::get('delInactiveRole'),
				'strInactiveReason' => Input::get('delInactiveReason')
				));
        	$role->boolIsActive = 0;
			$reason->save();
        	$role->save();
        	return Redirect::to('/maintenance/employeeRole?successDel=true');
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
		return Redirect::to('/maintenance/employee?successRec=true');
	 } else return Redirect::to('/maintenance/employee?successRec=false');
	}

	public function reactRole()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$role = Role::find($id);

		$reas = Input::get('reactInactiveRole');
		$reason = DB::table('tblReasonRole')
						->where('strInactiveRoleID', '=', $reas)
						->delete();

        $role->boolIsActive = 1;

        $role->save();
        return Redirect::to('/maintenance/employeeRole?successRec=true');
	 }else return Redirect::to('/maintenance/employeeRole?successRec=false');
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