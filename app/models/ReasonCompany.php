<?php

class ReasonCompany extends Eloquent {

	protected $table = 'tblReasonCompany';
	protected $primaryKey = 'strInactiveCompanyID';
	protected $fillable = array('strInactiveCompanyID',
								'strInactiveReason');


}
