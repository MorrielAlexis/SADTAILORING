<?php

class Employee extends Eloquent {

	public $incrementing = false;
	protected $table = 'tblEmployee';
	protected $primaryKey = 'strEmployeeID';
	protected $fillable = array('strEmpFName',
								'strEmpLName',
								'strEmpAge',
								'strSex',
								'strEmpAddress',
								'strRole',
								//'dtUpdatedAt'
								);

	public function employee() {

		return $this->belongsTo('Role', 'strEmpRoleID');
	}

}