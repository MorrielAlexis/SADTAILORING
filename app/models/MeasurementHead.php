<?php

class MeasurementHead extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblMeasurementHeader';
	protected $primaryKey = 'strMeasurementID';
<<<<<<< HEAD
	protected $fillable = array('strMeasurementID',
								'strCategoryName',
								'strSegmentName',
=======
	protected $fillable = array('strGarmentCategory',
								'strGarmentSegment',
>>>>>>> 9115b1669d877d3404977892f25f716cca305f5e
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