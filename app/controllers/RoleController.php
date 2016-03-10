<?php

class RoleController extends BaseController{
	

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
				->with('reason', $reason)
				->with('newID', $newID);	
	}

	public function addRole()
	{	
		$rol = Role::all();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		
		if(!trim(Input::get('addRoleName')) == '' && !trim(Input::get('addRoleDescription')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addRoleName')) && preg_match($regex, Input::get('addRoleDescription'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach ($rol as $rol)
			if(strcasecmp($rol->strEmpRoleName, trim(Input::get('addRoleName'))) == 0)
				$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$role = Role::create(array(
				'strEmpRoleID' => Input::get('addRoleID'),
				'strEmpRoleName' => trim(Input::get('addRoleName')),
				'strEmpRoleDesc' => trim(Input::get('addRoleDescription')),
				'boolIsActive' => 1
				));

				$role->save();
				return Redirect::to('/maintenance/employeeRole?success=true');
			}else return Redirect::to('/maintenance/employeeRole?success=duplicate');
		}else return Redirect::to('/maintenance/employeeRole?input=invalid');
	}

	public function editRole()
	{
		$id = Input::get('editRoleID');
		$role = Role::find($id);

		$rol = Role::all();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		
		if(!trim(Input::get('editRoleName')) == '' && !trim(Input::get('editRoleDescription')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editRoleName')) && preg_match($regex, Input::get('editRoleDescription'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		foreach ($rol as $rol)
			if(!strcasecmp($rol->strEmpRoleID, trim(Input::get('editRoleID'))) == 0 &&
				strcasecmp($rol->strEmpRoleName, trim(Input::get('editRoleName'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				$role->strEmpRoleName = trim(Input::get('editRoleName'));	
				$role->strEmpRoleDesc = trim(Input::get('editRoleDescription'));

				$role->save();
				return Redirect::to('/maintenance/employeeRole?successEdit=true');
			}else return Redirect::to('/maintenance/employeeRole?success=duplicate');
		}else return Redirect::to('/maintenance/employeeRole?input=invalid');	 
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
        return Redirect::to('/utilities/inactiveData?successRec=true');
	 }else return Redirect::to('/utilities/inactiveData?successRec=false');
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