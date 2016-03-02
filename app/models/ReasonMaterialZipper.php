<?php

class ReasonMaterialZipper extends Eloquent {

	protected $table = 'TblReasonMaterialZipper';
	protected $primaryKey = 'strInactiveZipperID';
	protected $fillable = array('strInactiveZipperID',
								'strInactiveReason');


}
