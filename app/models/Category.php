<?php

class Category extends Eloquent {

	protected $table = 'tblGarmentCategory';
	protected $primaryKey = 'strGarmentCategoryID';
	protected $fillable = array('strGarmentCategoryName',
								'strGarmentCategoryDesc');


	public function category() {

		return $this->hasMany('Segment');
	}

	public function measurement() {

		return $this->hasMany('MeasurementHead');
	}
}