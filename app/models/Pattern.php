<?php

class Pattern extends Eloquent {

	protected $table = 'tblDesignPattern';
	protected $primaryKey = 'strDesignPatternID';
	protected $fillable = array('strSegment',
								'strPatternName',
								'strPatternImage');


	public function pattern() {

		return $this->belongsTo('Segment');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}
}