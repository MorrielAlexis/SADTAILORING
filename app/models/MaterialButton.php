<?php

class MaterialButton extends Eloquent {

	protected $table = 'tblMaterialButton';
	protected $primaryKey = 'strMaterialButtonID';
	protected $fillable = array('strMaterialButtonID',
								'strMaterialButtonName',
								'strMaterialButtonSize',
								'strMaterialButtonColor',
								'strMaterialButtonDesc',
								'strMaterialButtonImage',
								'boolIsActive');


}
