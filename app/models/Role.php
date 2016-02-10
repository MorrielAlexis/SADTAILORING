<?php

class Role extends ELoquent {

	protected $table = 'tblEmployeeRole';
	protected $primaryKey = 'strEmpRoleID';
	protected $fillable = array('strEmpRoleName',
								'strEmpRoleDesc');


	public function role() {

		return $this->hasMany('Employee');
	}
}