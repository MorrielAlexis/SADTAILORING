<?php

class Company extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblCustCompany';
	protected $primaryKey = 'strCustCompanyID';
	protected $fillable = array('strCustCompanyID',
								'strCustCompanyName',
								'strCustCompanyAddress',
								'strCustContactPerson',
								'strCustCompanyEmailAddress',
								'strCustCompanyTelNumber',
								'strCustCompanyCPNumber',
								'strCustCompanyFaxNumber',
								'boolIsActive');


/*	public function company() {

		return $this->belongsTo('Customer');
	}
*/
}