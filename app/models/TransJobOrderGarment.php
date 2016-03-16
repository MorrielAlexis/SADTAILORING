<?php


class TransJobOrderGarment extends Eloquent{
	protected $table = 'tblJobOrder_Garment';
	protected $primaryKey = 'strJobOrderID', 'strCategoryID','strSegmentID';
	protected $fillable = array('strJobOrderID',' strSegPatternID',
								'boolIsActive);


}