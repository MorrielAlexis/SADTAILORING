<?php

class Category extends Eloquent {

	protected $table = 'tblGarmentCategory';
	protected $primaryKey = 'strGarmentCategoryID';
	protected $fillable = array('strGarmentCategoryID',
								'strGarmentCategoryName',
								'strGarmentCategoryDesc',
								'boolIsActive');

/*
	public function category() {

		return $this->hasMany('DesignPattern', 'strDesignPatternID');
		return $this->hasMany('Segment', 'strGarmentSegmentID');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}*/
}