<?php

class Category extends Eloquent {

	protected $table = 'tblGarmentCategory';
	protected $primaryKey = 'strGarmentCategoryID';
	protected $fillable = array('strGarmentCategoryID',
								'strGarmentCategoryName',
								'strGarmentCategoryDesc');


	public function category() {

		return $this->hasMany('Segment', 'strGarmentSegmetID');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}
}