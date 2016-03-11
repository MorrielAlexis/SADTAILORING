<?php

class ReasonMeasurementCategory extends Eloquent {

	protected $table = 'tblReasonMeasurementCategory';
	protected $primaryKey = 'strInactiveHeadID';
	protected $fillable = array('strInactiveHeadID',
								'strInactiveReason');


}
