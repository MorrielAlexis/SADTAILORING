<?php

class MaterialNeedle extends Eloquent {

	protected $table = 'tblMaterialNeedle';
	protected $primaryKey = 'strMaterialNeedleID';
	protected $fillable = array('strMaterialNeedleID',
								'strMaterialNeedleName',
								'strMaterialNeedleSize',
								'strMaterialNeedleDesc',
								'strMaterialNeedleImage',
								'boolIsActive');


}
