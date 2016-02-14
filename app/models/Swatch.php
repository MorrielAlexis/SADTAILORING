<?php

class Swatch extends Eloquent {

	protected $table = 'tblSwatches';
	protected $primaryKey = 'strSwatchID';
	protected $fillable = array('strSwatchID',
								'strFabricTypeName',
								'strSwatchName',
								'strSwatchCode',
								'strSwatchImageLink',
								'boolIsActive');





}
