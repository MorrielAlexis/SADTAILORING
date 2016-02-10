<?php

class Customer extends Eloquent {

	protected $table = 'tblCustomer';
	protected $primaryKey = 'strCustomerID';
	protected $fillable = array('strAcctType',
								'strCustAcctEmail',
								'strCustAcctPassword',
								'dtCreatedAt',
								'dtUpdatedAt');


	public function customer() {

		return $this->hasMany('PrivateIndividual', 'Company');
	}

	public function accountType(){

		return $this->belongsTo('CustomerAccountType');
	}
}