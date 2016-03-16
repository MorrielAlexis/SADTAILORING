<?php


class TransMeasurement extends Eloquent{
	protected $table = 'tblMeasurement';
	protected $primaryKey = 'strJobOrderID', 'strCategoryID', 'strSegmentID';
	protected $fillable = array('strJobOrderID',							'strCategoryID',
								'strSegmentID',
								'strMeasurePartName',
								'dblMeasurement',
								'strNotes',
								'boolIsActive');


}