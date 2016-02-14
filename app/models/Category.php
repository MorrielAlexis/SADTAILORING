<?php

class Category extends Eloquent {

	protected $table = 'tblGarmentCategory';
	protected $primaryKey = 'strGarmentCategoryID';
	protected $fillable = array('strGarmentCategoryID',
								'strGarmentCategoryName',
								'txtGarmentCategoryDesc',
								'boolIsActive');

/*
	public function category() {

		return $this->hasMany('Segment', 'strGarmentSegmentID');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}*/
}