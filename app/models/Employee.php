<?php

class Employee extends Eloquent
{
	protected $table = 'tblEmployees';
	protected $primaryKey = 'strEmpID';
	protected $fillable = array('strEmpID', 
								'strEmpFName', 
								'strEmpLName', 
								'strEmpAddress', 
								'intEmpAge', 
								'strEmpRoleID',
								'strCellNo',
								'strPhoneNo',
								'strEmailAdd');

	public function role() {
		return $this->belongsTo('Role', 'strEmpRoleID');
	}


}