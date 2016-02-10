<?php

class Segment extends Eloquent {

	public $incrementing = false;
	protected $table = 'tblGarmentSegment';
	protected $primaryKey = 'strGarmentSegmentID';
	protected $fillable = array('strCategory',
								'strSegmentName',
								'txtSegmentDesc');


	public function segment() {

		return $this->belongsTo('Category', 'strGarmentCategoryID');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}

	public function pattern() {

		return $this->hasMany('Pattern', 'strDesignPatternID');
	}
}