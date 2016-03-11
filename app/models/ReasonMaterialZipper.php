<?php

class ReasonMaterialZipper extends Eloquent {

	protected $table = 'tblReasonMaterialZipper';
	protected $primaryKey = 'strInactiveZipperID';
	protected $fillable = array('strInactiveZipperID',
								'strInactiveReason');


}
