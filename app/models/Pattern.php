<?php

class Pattern extends Eloquent {

	public $incrementing = false;
	protected $table = 'tblDesignPattern';
	protected $primaryKey = 'strDesignPatternID';
	protected $fillable = array('strSegment',
								'strPatternName',
								'strPatternImage');


	public function pattern() {

		return $this->belongsTo('Segment', 'strGarmentSegmentID');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}
}