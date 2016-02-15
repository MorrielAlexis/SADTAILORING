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

		$roles =  Role::lists('strEmpRoleName', 'strEmpRoleID'); 		
		
		$employee = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->select('tblEmployee.*', 'tblEmployeeRole.strEmpRoleName')
            ->get();

		return View::make('employee')
					->with('employee', $employee)
					->with('employee2', $employee)
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

		return View::make('employeeRole')->with('role', $role)->with('newID', $newID);
	}

	public function addEmployee()
	{	

		$employee = Employee::create(array(
			'strEmployeeID' => Input::get('addEmpID'),
			'strEmpFName' => Input::get('addFirstName'),		
			'strEmpLName' => Input::get('addLastName'),
			'strEmpAge' => Input::get('addAge'),
			'strSex' => Input::get('addSex'),
			'strEmpAddress' => Input::get('addAddress'),			
			'strRole' => Input::get('addRoles'), 
			'strCellNo' => Input::get('addCellNo'),
			'strPhoneNo' => Input::get('addPhoneNo'),
			'strEmailAdd' => Input::get('addEmail'),
			'boolIsActive' => 1
			));

		$employee->save();
		return Redirect::to('/employee');
	}

	public function addRole()
	{	
		dd(Input::get('addRoleDescription'));
		$role = Role::create(array(
			'strEmpRoleID' => Input::get('addRoleID'),
			'strEmpRoleName' => Input::get('addRoleName'),
			'strEmpRoleDesc' => Input::get('addRoleDescription')
			));

		$role->save();
		return Redirect::to('/employeeRole');
	}

	public function editEmployee()
	{
		$id = Input::get('editEmpID');
		$employee = Employee::find($id);

		$employee->strEmpFName = Input::get('editFirstName');	
		$employee->strEmpLName = Input::get('editLastName');		
		$employee->strEmpAge = Input::get('editAge');
		$employee->strSex = Input::get('editSex');
		$employee->strEmpAddress = Input::get('editAddress');
		$employee->strRole = Input::get('editRoles');
		$employee->strCellNo = Input::get('editCellNo');
		$employee->strPhoneNo = Input::get('editPhoneNo');
		$employee->strEmailAdd = Input::get('editEmail');

		$employee->save();
		return Redirect::to('/employee');
	}

	public function editRole()
	{
		$id = Input::get('editRoleID');
		$role = Role::find($id);

		$role->strEmpRoleName = Input::get('editRoleName');	
		$role->strEmpRoleDesc = Input::get('editRoleDescription');

		$role->save();
		return Redirect::to('/employeeRole');
	}

	public function delEmployee()
	{
		$id = Input::get('delEmpID');
		$employee = Employee::find($id);

		$employee->boolIsActive = 0;

		$employee->save();
		return Redirect::to('/employee');
	}

	public function reactEmployee()
	{	
		$id = Input::get('reactID');
		$employee = Employee::find($id);

		$employee->boolIsActive = 1;

		$employee->save();
		return Redirect::to('/employee');
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