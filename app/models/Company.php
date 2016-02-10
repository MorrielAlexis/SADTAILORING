<?php

class Company extends Eloquent {

	protected $table = 'tblCustCompany';
	protected $primaryKey = 'strCustCompanyID';
	protected $fillable = array('strTypeID',
								'strCustID',
								'strCustCompanyName',
								'strCustCompanyAddress',
								'strCustContactPerson',
								'strCustCompanyEmailAddress',
								'strCustPhoneNumber',
								'strCustLandlineNumber',
								'strCustFaxNumber');


	public function company() {

		return $this->belongsTo('Customer');
	}

	public function customerType() {

		return $this->belongsTo('CustomerType');
	}
}