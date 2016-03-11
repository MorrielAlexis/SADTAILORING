<?php

class ReasonIndividual extends Eloquent {

	protected $table = 'tblReasonIndividual';
	protected $primaryKey = 'strInactiveIndividualID';
	protected $fillable = array('strInactiveIndividualID',
								'strInactiveReason');


}
