<?php

class ReasonMeasurementCategory extends Eloquent {

	protected $table = 'TblReasonMeasurementCategory';
	protected $primaryKey = 'strInactiveHeadID';
	protected $fillable = array('strInactiveHeadID',
								'strInactiveReason');


}
