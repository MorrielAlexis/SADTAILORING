<?php

class TransJobOrderFabric extends Eloquent{
	

	protected $table = 'tblJobOrder_Fabric';
	protected $primaryKey = 'strOrderID', 'strFabricSwatch';
	protected $fillable = array('strOrderID','strFabricSwatch',
								'strOrderID',
								'strFabricSwatch',
								'boolIsActive');


}