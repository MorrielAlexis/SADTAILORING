<?php

class EmployeeController extends BaseController{
	

	public function empProfile()
	{	
		$employee = Employee::all();

		return View::make('employee')->with('employee', $employee);
	}

	public function roles()
	{
		return View::make('employeeRole');
	}

	public function addEmployee()
	{
		$employee = Employee::create(array(
			'strEmpID' => '1',
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
}