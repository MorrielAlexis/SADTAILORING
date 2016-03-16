<?php

class TransPrice extends Eloquent{
	

	protected $table = 'tblPrice';
	protected $primaryKey = 'strJobOrderID';
	protected $fillable = array('strJobOrderID',
								// 'strPriceJobOrderID',
								'dblPricePerOrder',
								'strTOPDescription',
								'dtDateAsOf',
								'boolIsActive);


}