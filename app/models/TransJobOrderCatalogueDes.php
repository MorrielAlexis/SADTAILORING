<?php

class TransJobOrderCatalogueDes extends Eloquent{
	

class TransJobOrderCatalogueDes extends Eloquent{
	protected $table = 'tblPrice';
	protected $primaryKey = 'strJobOrderID', 'strCatDesignID';
	protected $fillable = array('strJobOrderID',' strCatDesignID',
								'strJobOrderID',
								'strCatDesignID',
								'dblPricePerOrder',
								'boolIsActive);


}