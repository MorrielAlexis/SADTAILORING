<?php

class ReasonCompany extends Eloquent {

	protected $table = 'TblReasonCompany';
	protected $primaryKey = 'strInactiveCompanyID';
	protected $fillable = array('strInactiveCompanyID',
								'strInactiveReason');


}
