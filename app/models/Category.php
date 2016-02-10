<?php

class Category extends Eloquent {

	public $incrementing = false;
	protected $table = 'tblGarmentCategory';
	protected $primaryKey = 'strGarmentCategoryID';
	protected $fillable = array('strGarmentCategoryName',
								'strGarmentCategoryDesc');


	public function category() {

		return $this->hasMany('Segment', 'strGarmentSegmetID');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead', 'strMeasurementID');
	}
}