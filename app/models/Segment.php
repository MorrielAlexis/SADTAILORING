<?php

class Segment extends Eloquent {

	protected $table = 'tblGarmentSegment';
	protected $primaryKey = 'strGarmentSegmentID';
	protected $fillable = array('strCategory',
								'strSegmentName',
								'txtSegmentDesc');


	public function segment() {

		return $this->belongsTo('Category');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}

	public function pattern() {

		return $this->hasMany('Pattern', 'strDesignPatternID');
	}
}