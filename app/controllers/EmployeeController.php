<?php

class EmployeeController extends BaseController{
	

	public function empProfile()
	{
		return View::make('employee');
	}

	public function roles()
	{
		return View::make('employeeRole');
	}

}