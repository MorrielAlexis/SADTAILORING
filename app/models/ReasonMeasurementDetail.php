<?php

class ReasonMeasurementDetail extends Eloquent {

	protected $table = 'tblReasonMeasurementDetail';
	protected $primaryKey = 'strInactiveDetailID';
	protected $fillable = array('strInactiveDetailID',
								'strInactiveReason');


}
