<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		if(Session::has('user'))
		{
			return Redirect::to('/index');
		}
		return View::make('login');
	}

	public function LogIn()
	{
		$user = Input::get('username');
		$pass = Input::get('password');
		$check1 = User::where('strUserID','=', $user)->first();
		$check2 = User::where('strPassword','=',$pass)->first();	
		if($check1 == $check2)
		{
			$empID = DB::table('tblUser')
				->join('tblEmployee', 'tblUser.strLoginEmpID', '=', 'tblEmployee.strEmployeeID')
				->leftJoin('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
				->where('tblUser.strUserID', '=', $user )
				->first();

			$name = $empID ->strEmpFName . " " . $empID ->strEmpLName;
			Session::put('user',$name);
			return View::make('layouts/master')->with('user', $user)->with('empID', $empID);
		}else
			return Redirect::to('/')->with('message', 'Login Failed, USERNAME/PASSWORD Dont Exists');
	}

	public function remembLog()
	{
		if(!Session::has('user'))
		{
			return Redirect::to('/');
		}
		else
		{
			$empID = DB::table('tblUser')
			->join('tblEmployee',function($join)
			{
				$join->on('tblUser.strLoginEmpID','=','tblEmployee.strEmployeeID');
					// ->where('tblLogin.strUsername','=',Session::get('username'));
			})->get();

			return View::make('layouts/master')->with('empID', $empID);
		}
	}

	public function LogOut()
	{
		Session::flush();
		return Redirect::to('/');
	}
}




