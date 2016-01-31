<?php

class Employee extends Eloquent
{
	protected $table = 'tblEmployees';
	protected $primaryKey = 'strEmpID';
	protected $fillable = array('strEmpID' , 'strEmpFName', 'strEmpLName', 'strEmpAddress', 'intEmpAge', 'strEmpRoleID');


}