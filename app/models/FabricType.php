<?php

class FabricType extends Eloquent {

	protected $table = 'tblFabricType';
	protected $primaryKey = 'strFabricTypeID';
	protected $fillable = array('strFabricTypeID',
								 'strFabricTypeName',
								 'textFabricTypeDesc',
								 'boolIsActive');
	
}