<?php

class PrivateIndividual extends Eloquent {

	protected $table = 'tblCustPrivateIndividual';
	protected $primaryKey = 'strCustPrivIndivID';
	protected $fillable = array('strTypeID',
								'strCustID',
								'strCustFName',
								'strCustLName',
								'intGender',
								'strCustAddress',
								'strCustEmailAddress',
								'strCustPhoneNumber',
								'strCustLandlineNumber');


	public function privateIndividual() {

		return $this->belongsTo('Customer');
	}

	public function customerType() {

		return $this->belongsTo('CustomerType');
	}

	public function gender() {

		return $this->belongsTo('Gender');
	}
}