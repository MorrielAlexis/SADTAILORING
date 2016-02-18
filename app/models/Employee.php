<?php

class Employee extends Eloquent {

	//public $incrementing = false;
	protected $table = 'tblEmployee';
	protected $primaryKey = 'strEmployeeID';
	protected $fillable = array('strEmployeeID',
								'strEmpFName',
								'strEmpMName',
								'strEmpLName',
								'strEmpAge',
								'strSex',
								'strEmpAddress',
								'strRole',
								'strCellNo',
								'strPhoneNo',
								'strEmailAdd',
								'boolIsActive'
								//'dtUpdatedAt'
								);
	/*
	public function employee() {

		return $this->belongsTo('Role', 'strEmpRoleID');
	}*/

}