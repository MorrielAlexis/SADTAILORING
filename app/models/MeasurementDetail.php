<?php

class MeasurementDetail extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblMeasurementDetail';
	protected $primaryKey = 'strMeasurementDetailID';
	protected $fillable = array('strMeasurementDetailID',
								'strMeasurementDetailName',
								'strMeasurementDetailDesc',
								'boolIsActive');


	public function header() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}
}