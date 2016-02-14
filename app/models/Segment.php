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
=======

>>>>>>> ed36e718164fdf63abb6791326faaa931857412d
	/*
	public function segment() {

	
	// public function segment() {


	// 	return $this->belongsTo('Category', 'strGarmentCategoryID');
	// }

	// public function measurement() {

	// 	return $this->hasMany('MeasurementHead', 'strMeasurementID');
	// }

	// public function pattern() {
		return $this->hasMany('Pattern', 'strDesignPatternID');
	}*/

	// 	return $this->hasMany('Pattern', 'strDesignPatternID');
	// }

}