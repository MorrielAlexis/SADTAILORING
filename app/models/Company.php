<?php

class Company extends Eloquent {

	public $incrementing = false;
	protected $table = 'tblCustCompany';
	protected $primaryKey = 'strCustCompanyID';
	protected $fillable = array('strCustCompanyName',
								'strCustCompanyAddress',
								'strCustContactPerson',
								'strCustCompanyEmailAddress',
								'strCustPhoneNumber',
								'strCustLandlineNumber',
								'strCustFaxNumber');


/*	public function company() {

		return $this->belongsTo('Customer');
	}
*/
}