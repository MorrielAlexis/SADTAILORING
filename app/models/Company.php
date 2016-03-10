<?php

class Company extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblCustCompany';
	protected $primaryKey = 'strCustCompanyID';
	protected $fillable = array('strCustCompanyID',
								'strCustCompanyName',
								'strCustCompanyHouseNo',
								'strCustCompanyStreet',
								'strCustCompanyBarangay',
								'strCustCompanyCity',
								'strCustCompanyProvince',
								'strCustCompanyZipCode',
								'strCustContactPerson',
								'strCustCompanyEmailAddress',
								'strCustCompanyTelNumber',
								'strCustCompanyCPNumber',
								'strCustCompanyCPNumberAlt',
								'strCustCompanyFaxNumber',
								'boolIsActive');


/*	public function company() {

		return $this->belongsTo('Customer');
	}
*/
}