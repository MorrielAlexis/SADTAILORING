<?php

class Customer 	extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblCustomer';
	protected $primaryKey = 'strCustomerID';
	protected $fillable = array('strCustomerID',
								'boolHasAccount',
								'boolIsActive');


/*	public function company() {

		return $this->belongsTo('Customer');
	}
*/
}