<?php


class TransJobOrderGarment extends Eloquent{
	protected $table = 'tblJobOrder_Garment';
	protected $primaryKey = 'strJobOrderID';
	protected $fillable = array('strJobOrderID', 
								'strCategoryID',
								'strSegmentID',
								'boolIsActive');


}