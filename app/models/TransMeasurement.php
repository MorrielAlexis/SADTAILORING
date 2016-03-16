<?php

class TransMeasurement extends Eloquent{
	

	protected $table = 'tblCustomer';
	protected $primaryKey = 'strCustomerID';
	protected $fillable = array('strCustomerID',
								'boolHasAccount',
								'boolIsActive');


}