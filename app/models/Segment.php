<?php

class Segment extends Eloquent {

	protected $table = 'tblGarmentSegment';
	protected $primaryKey = 'strGarmentSegmentID';
	protected $fillable = array('strGarmentSegmentID',
								'strCategory',
								'strGarmentSegmentName',
								'txtGarmentSegmentDesc',
								'boolIsActive');

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