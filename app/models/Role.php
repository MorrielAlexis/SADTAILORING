<?php

class Role extends ELoquent {

	public $incrementing = false;
	protected $table = 'tblEmployeeRole';
	protected $primaryKey = 'strEmpRoleID';
	protected $fillable = array('strEmpRoleName',
								'strEmpRoleDesc');


	public function role() {

		return $this->hasMany('Employee', 'strEmployeeID');
	}
}