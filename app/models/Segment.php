<?php

class Segment extends Eloquent {

	protected $table = 'tblGarmentSegment';
	protected $primaryKey = 'strGarmentSegmentID';
	protected $fillable = array('strGarmentSegmentID',
								'strCategory',
								'strGarmentSegmentName',
								'txtGarmentSegmentDesc',
								'boolIsActive');

<<<<<<< HEAD
	/*
	public function segment() {
=======
	
	// public function segment() {
>>>>>>> 9115b1669d877d3404977892f25f716cca305f5e

	// 	return $this->belongsTo('Category', 'strGarmentCategoryID');
	// }

	// public function measurement() {

	// 	return $this->hasMany('MeasurementHead', 'strMeasurementID');
	// }

	// public function pattern() {

<<<<<<< HEAD
		return $this->hasMany('Pattern', 'strDesignPatternID');
	}*/
=======
	// 	return $this->hasMany('Pattern', 'strDesignPatternID');
	// }
>>>>>>> 9115b1669d877d3404977892f25f716cca305f5e
}