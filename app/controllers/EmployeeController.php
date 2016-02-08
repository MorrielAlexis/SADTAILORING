<?php

class EmployeeController extends BaseController{
	

	public function empProfile()
	{	
		$ids = DB::table('tblEmployees')
			->select('strEmpID')
			->orderBy('updated_at', 'desc')
			->orderBy('strEmpID', 'desc')
			->take(1)
			->get();


		$ID = $ids["0"]->strEmpID;
		$newID = $this->smartCounter($ID);	

		$employee = Employee::all();

		return View::make('employee')->with('employee', $employee)->with('newID', $newID);
	}

	public function roles()
	{
		return View::make('employeeRole');
	}

	public function addEmployee()
	{
		$employee = Employee::create(array(
			'strEmpID' => Input::get('EmpID'),
			'strEmpFName' => Input::get('FirstName'),		
			'strEmpLName' => Input::get('LastName'),
			'strEmpAddress' => Input::get('Address'),
			'intEmpAge' => Input::get('Age'),
			'strEmpRoleID' => 1
			));

		$employee->save();
		return Redirect::to('/employee');
	}

	public function editEmployee()
	{
		$id = Input::get('EmpID');
		$employee = Employee::find($id);

		$employee->strEmpFName = Input::get('FirstName');	
		$employee->strEmpLName = Input::get('LastName');
		$employee->strEmpAddress = Input::get('Address');
		$employee->intEmpAge = Input::get('Age');

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
//dd(count($lastID));
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