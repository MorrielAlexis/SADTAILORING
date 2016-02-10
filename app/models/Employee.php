<?php

class Employee extends Eloquent {

	protected $table = 'tblEmployee';
	protected $primaryKey = 'strEmployeeID';
	protected $fillable = array('strEmpFName',
								'strEmpLName',
								'strEmpAge',
								'strGender',
								'strEmpAddress',
								'strRole',
								'dtUpdatedAt');

	public function employee() {

		return $this->belongsTo('Role');
	}

	public function gender() {

		return $this->belongsTo('Gender');
	}

	public function jobProgress() {

		return $this->hasMany('JobProgress');
	}
}