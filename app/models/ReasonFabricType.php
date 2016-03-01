<?php

class ReasonFabricType extends Eloquent {

	protected $table = 'TblReasonFabricType';
	protected $primaryKey = 'strInactiveFabricTypeID';
	protected $fillable = array('strInactiveFabricTypeID',
								'strInactiveReason');


}
