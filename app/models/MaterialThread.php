<?php

class MaterialThread extends Eloquent {

	protected $table = 'tblMaterialThread';
	protected $primaryKey = 'strMaterialThreadID';
	protected $fillable = array('strMaterialThreadID',
								'strMaterialThreadName',
								'strMaterialThreadColor',
								'strMaterialThreadDesc',
								'strMaterialThreadImage',
								'boolIsActive');


}
