<?php

class MeasurementHead extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblMeasurementHeader';
	protected $primaryKey = 'strMeasurementID';

	protected $fillable = array('strMeasurementID',
								'strCategoryName',
								'strSegmentName',
								'strGarmentCategory',
								'strGarmentSegment',
								'strMeasurementName');


	public function category() {

		return $this->belongsTo('Category', 'strGarmentCategoryID');
	}

	public function segment() {

		return $this->belongsTo('Segment', 'strGarmentSegmentID');
	}

	public function pattern() {

		return $this->belongsTo('Pattern', 'strDesignPatternID');
	}
}