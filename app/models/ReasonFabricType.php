<?php

class ReasonFabricType extends Eloquent {

	protected $table = 'tblReasonFabricType';
	protected $primaryKey = 'strInactiveFabricTypeID';
	protected $fillable = array('strInactiveFabricTypeID',
								'strInactiveReason');


}
