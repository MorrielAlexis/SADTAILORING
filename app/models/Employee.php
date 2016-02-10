<?php

class Employee extends Eloquent {

	protected $table = 'tblEmployee';
	protected $primaryKey = 'strEmployeeID';
	protected $fillable = array('strEmpFName',
								'strEmpLName',
								'strEmpAge',
								'intSex',
								'strEmpAddress',
								'strRole',
								'dtUpdatedAt');

	public function employee() {

		return $this->belongsTo('Role');
	}

	public function sex() {

		return $this->belongsTo('Sex');
	}

	public function jobProgress() {

		return $this->hasMany('JobProgress', 'strEmpJobProgressID');
	}
}