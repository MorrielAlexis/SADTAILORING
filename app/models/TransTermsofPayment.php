<?php

class TransTermsofPayment extends Eloquent{
	

	protected $table = 'tblTermsOfPayment';
	protected $primaryKey = 'strJobDescriptionID';
	protected $fillable = array('strTermsOfPaymentID',
								'strTOPName',
								'strTOPDescription');


}