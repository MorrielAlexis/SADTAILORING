<?php

class Swatch extends Eloquent {

	protected $table = 'tblSwatches';
	protected $primaryKey = 'strSwatchID';
	protected $fillable = array('strSwatchID',
								'strSwatchFabricTypeName',
								'strSwatchName',
								'strSwatchCode',
								'strSwatchImageLink',
								'boolIsActive');





}
