<?php

class CustomerAccountType extends Eloquent {

	protected $table = 'tblCustomerAcctType';
	protected $primaryKey = 'strCustAcctTypeID';
	protected $fillable = array('strCustAcctTypeName',
								'strCustAcctTypeDesc');


	public function accountType() {

		return $this->hasMany('Customer', 'strCustomerID');
	}
}