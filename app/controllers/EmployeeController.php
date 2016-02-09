<?php

class EmployeeController extends BaseController{
	

	public function empProfile()
	{	
		$ids = DB::table('tblEmployees')
			->select('strEmpID')
			->orderBy('created_at', 'desc')
			->orderBy('strEmpID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strEmpID;
		$newID = $this->smartCounter($ID);	

		$roles =  Role::lists('strRoleName', 'strRoleID'); 
		
		//$employee = Employee::all();
		
		
		$employee = DB::table('tblEmployees')
            ->join('tblRoles', 'tblEmployees.strEmpRoleID', '=', 'tblRoles.strRoleID')
            ->select('tblEmployees.*', 'tblRoles.strRoleName')
            ->get();

		return View::make('employee')
					->with('employee', $employee)
					->with('roles', $roles)
					->with('newID', $newID);
	}

	public function roles()
	{	
		$ids = DB::table('tblRoles')
			->select('strRoleID')
			->orderBy('created_at')
			->orderBy('strRoleID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strRoleID;
		$newID = $this->smartCounter($ID);	

		$role = Role::all();

		return View::make('employeeRole')->with('role', $role)->with('newID', $newID);
	}

	public function addEmployee()
	{	

		$employee = Employee::create(array(
			'strEmpID' => Input::get('EmpID'),
			'strEmpFName' => Input::get('FirstName'),		
			'strEmpLName' => Input::get('LastName'),
			'strEmpAddress' => Input::get('Address'),
			'intEmpAge' => Input::get('Age'),
			'strEmpRoleID' => Input::get('roles'), 
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
			'strRoleID' => Input::get('RoleID'),
			'strRoleName' => Input::get('RoleName'),
			'strRoleDescription' => Input::get('RoleDescription')
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
		$employee->strEmpRoleID = Input::get('roles');
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

		$role->strRoleName = Input::get('RoleName');	
		$role->strRoleDescription = Input::get('RoleDescription');

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