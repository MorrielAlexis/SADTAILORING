<?php

class CustomerType extends Eloquent {

	protected $table = 'tblCustomerType';
	protected $primaryKey = 'strCustTypeID';
	protected $fillable = array('strCustTypeName',
								'strCustTypeDesc');


	public function customer() {

		return $this->hasMany('PrivateIndividual', 'Company', 'strCustPrivIndivID', 'strCustCompanyID');
	}
}