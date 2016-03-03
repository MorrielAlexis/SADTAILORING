<?php

class ReasonMeasurementDetail extends Eloquent {

	protected $table = 'TblReasonMeasurementDetail';
	protected $primaryKey = 'strInactiveDetailID';
	protected $fillable = array('strInactiveDetailID',
								'strInactiveReason');


}
