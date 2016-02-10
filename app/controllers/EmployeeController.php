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
		
		//$employee = Employee::all();
		
		
		$employee = DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->select('tblEmployee.*', 'tblEmployeeRole.strEmpRoleName')
            ->get();

		return View::make('employee')
					->with('employee', $employee)
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
			'strEmployeeID' => Input::get('EmpID'),
			'strEmpFName' => Input::get('FirstName'),		
			'strEmpLName' => Input::get('LastName'),
			'strEmpAge' => Input::get('Age'),
			'strSex' => 'M',
			'strEmpAddress' => Input::get('Address'),			
			'strRole' => Input::get('roles'), 
			'strCellNo' => Input::get('CellNo'),
			'strPhoneNo' => Input::get('PhoneNo'),
			'strEmailAdd' => Input::get('Email')
			));

		$employee->save();
		return Redirect::to('/employee');
	}

	public function addRole()
	{	
		$role = Role::create(array(
			'strEmpRoleID' => Input::get('RoleID'),
			'strEmpRoleName' => Input::get('RoleName'),
			'txtEmpRoleDesc' => Input::get('RoleDescription')
			));

		$role->save();
		return Redirect::to('/employeeRole');
	}

	public function editEmployee()
	{
		$id = Input::get('EmpID');
		$employee = Employee::find($id);

		$employee->strEmpFName = Input::get('FirstName');	
		$employee->strEmpLName = Input::get('LastName');
		$employee->strEmpAddress = Input::get('Address');
		$employee->intEmpAge = Input::get('Age');
		$employee->strRole = Input::get('roles');
		$employee->strCellNo = Input::get('CellNo');
		$employee->strPhoneNo = Input::get('PhoneNo');
		$employee->strEmailAdd = Input::get('Email');

		$employee->save();
		return Redirect::to('/employee');
	}

	public function editRole()
	{
		$id = Input::get('RoleID');
		$role = Role::find($id);

		$role->strEmpRoleName = Input::get('RoleName');	
		$role->strEmpRoleDescription = Input::get('RoleDescription');

		$role->save();
		return Redirect::to('/employeeRole');
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