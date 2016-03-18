<?php

class TransJobOrderFabric extends Eloquent{
	

	protected $table = 'tblJobOrder_Fabric';
	protected $primaryKey = 'strOrderID';
	protected $fillable = array('strOrderID',
								'strFabricSwatch',
								'boolIsActive');


}