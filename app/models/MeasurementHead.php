<?php

class MeasurementHead extends Eloquent {

	protected $table = 'tblMeasurementHeader';
	protected $primaryKey = 'strMeasurementID';
	protected $fillable = array('strGarmentCategory',
								'strGarmentSegment',
								'strDesignPattern',
								'strMeasurementName');


	public function category() {

		return $this->belongsTo('Category');
	}

	public function segment() {

		return $this->belongsTo('Segment');
	}

	public function pattern() {

		return $this->belongsTo('Pattern');
	}
}