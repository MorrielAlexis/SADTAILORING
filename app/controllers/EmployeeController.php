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

		$employee = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->select('tblEmployee.*', 'tblEmployeeRole.strEmpRoleName')
            ->get();

		return View::make('employee')
					->with('employee', $employee)
					->with('employee2', $employee)
					->with('roles2', $roles)
					->with('roles', $roles)
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

		return View::make('employeeRole')
				->with('role', $role)
				->with('role2', $role)
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
			if(strcmp($emp->strEmpFName, Input::get('addFirstName')) == 0 &&
				    strcmp($emp->strEmpMName, Input::get('addMiddleName')) == 0 &&
					strcmp($emp->strEmpLName, Input::get('addLastName')) == 0){
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
			return Redirect::to('/employee?success=true');
		} else return Redirect::to('/employee?success=false');
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
			return Redirect::to('/employeeRole?success=true');
		}else return Redirect::to('/employeeRole?success=false');
	}

	public function editEmployee()
	{
		$id = Input::get('editEmpID');
		$isEdited = FALSE;


	if(!$isEdited){
		$employee = Employee::find($id);

		$employee->strEmpFName = Input::get('editFirstName');	
		$employee->strEmpLName = Input::get('editLastName');	
		$employee->strEmpMName = Input::get('editMiddleName');	
		$employee->dtEmpBday = Input::get('editdtEmpBday');
		$employee->strSex = Input::get('editSex');
		$employee->strEmpAddress = Input::get('editAddress');
		$employee->strRole = Input::get('editRoles');
		$employee->strCellNo = Input::get('editCellNo');
		$employee->strCellNoAlt = Input::get('editCellNoAlt');
		$employee->strPhoneNo = Input::get('editPhoneNo');
		$employee->strEmailAdd = Input::get('editEmail');

		$employee->save();
		return Redirect::to('/employee?successEdit=true');
	 } else return Redirect::to('/employee?successEdit=false');
	}

	public function editRole()
	{
		$id = Input::get('editRoleID');
		$isEdited = FALSE;


	if(!$isEdited){
		$role = Role::find($id);

		$rol = Role::all();
		$isAdded = FALSE;

		foreach ($rol as $rol)
			if(strcasecmp($rol->strEmpRoleName, Input::get('editRoleName')) == 0)
					$isAdded = TRUE;

		if(!$isAdded){
			$role->strEmpRoleName = Input::get('editRoleName');	
			$role->strEmpRoleDesc = Input::get('editRoleDescription');

			$role->save();
		}

		return Redirect::to('/employeeRole?successEdit=true');
	 } else return Redirect::to('/employeeRole?successEdit=false');
	}

	public function delEmployee()
	{
		$id = Input::get('delEmpID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$employee = Employee::find($id);

		$employee->boolIsActive = 0;

		$employee->save();
		return Redirect::to('/employee?successDel=true');
	 } else return Redirect::to('/employee?successDel=false');
	}

	public function delRole()
	{
		$id = Input::get('delRoleID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$role = Role::find($id);

		$count = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->select('tblEmployeeRole.*')
            ->where('tblEmployeeRole.strEmpRoleID','=', $id)
            ->count();

        if ($count == 0) {
        	$role->boolIsActive = 0;
        	$role->save();
        	return Redirect::to('/employeeRole?successDel=true');
        } else {
        	return Redirect::to('/employeeRole?successDel=true');
        }
      } else return Redirect::to('/employeeRole?successDel=false');

	}

	public function reactEmployee()
	{	
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$employee = Employee::find($id);

		$employee->boolIsActive = 1;

		$employee->save();
		return Redirect::to('/employee?successRec=true');
	 } else return Redirect::to('/employee?successRec=false');
	}

	public function reactRole()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$role = Role::find($id);

        $role->boolIsActive = 1;

        $role->save();
        return Redirect::to('/employeeRole?successRec=true');
	 }else return Redirect::to('/employeeRole?successRec=false');
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