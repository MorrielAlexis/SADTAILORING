<?php

class TransPrice extends Eloquent{
	

	protected $table = 'tblPrice';
	protected $primaryKey = 'strPriceID';
	protected $fillable = array('strPriceID',
								'strPriceJobOrderID',
								'dblPricePerOrder',
								'dtDateAsOf',
								'boolIsActive');


}