<?php

class Role extends Eloquent
{
	protected $table = 'tblRoles';
	protected $primaryKey = 'strRoleID';
	protected $fillable = array('strRoleID','strRoleName', 'strRoleDescription');

	public function employees() {
		return $this->hasMany('Employee', 'strEmpRoleID', 'strRoleID');
	}
}
