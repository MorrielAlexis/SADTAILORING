<?php

class MaterialZipper extends Eloquent {

	protected $table = 'tblMaterialZipper';
	protected $primaryKey = 'strMaterialZipperID';
	protected $fillable = array('strMaterialZipperID',
								'strMaterialZipperName',
								'strMaterialZipperSize',
								'strMaterialZipperColor',
								'strMaterialZipperImage',
								'boolIsActive');


}
