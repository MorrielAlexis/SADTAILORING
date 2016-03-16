<?php


class TransJobOrderSegmentPattern extends Eloquent{
	protected $table = 'tblJobOrder_SegmentPattern';
	protected $primaryKey = 'strJobOrderID', 'strSegPatternID';
	protected $fillable = array('strJobOrderID',' strSegPatternID',
								'boolIsActive);


}