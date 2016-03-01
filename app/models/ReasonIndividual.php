<?php

class ReasonIndividual extends Eloquent {

	protected $table = 'TblReasonIndividual';
	protected $primaryKey = 'strInactiveIndividualID';
	protected $fillable = array('strInactiveIndividualID',
								'strInactiveReason');


}
