<?php

class Role extends Eloquent {

	protected $table = 'tblEmployeeRole';
	protected $primaryKey = 'strEmpRoleID';
	protected $fillable = array('strEmpRoleID',
								'strEmpRoleName',
								'strEmpRoleDesc');

	
	public function employees() {

		return $this->hasMany('Employee', 'strEmployeeID');
	}
}