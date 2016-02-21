<?php

class MaterialHookAndEye extends Eloquent {

	protected $table = 'tblMaterialHookAndEye';
	protected $primaryKey = 'strMaterialHookID';
	protected $fillable = array('strMaterialHookID',
								'strMaterialHookName',
								'strMaterialHookSize',
								'strMaterialHookColor',
								'strMaterialHookImage',
								'boolIsActive');


}
