<?php

class JobProgress extends Eloquent {

	protected $table = 'tblEmployeeJobProgress';
	protected $primaryKey = 'strEmpJobProgressID';
	protected $fillable = array('strOrder',
								'intJobProgress',
								'strEmpID',
								'dtAsOf');


	public function jobProgress() {

		return $this->belongsTo('ProgressDetail');
	}

	public function employee() {

		return $this->belongsTo('Employee');
	}
}