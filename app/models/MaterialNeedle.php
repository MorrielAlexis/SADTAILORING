<?php

class MaterialNeedle extends Eloquent {

	protected $table = 'tblMaterialNeedle';
	protected $primaryKey = 'strMaterialThreadID';
	protected $fillable = array('strMaterialNeedleID',
								'strMaterialNeedleName',
								'strMaterialNeedleSize',
								'strMaterialNeedleImage',
								'boolIsActive');


}
