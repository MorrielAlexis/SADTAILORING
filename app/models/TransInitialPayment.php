<?php

class TransInitialPayment extends Eloquent{
	

	protected $table = 'tblInitialPayment';
	protected $primaryKey = 'strInitialPaymentID';
	protected $fillable = array('strInitialPaymentID',
								'strInPaymentID',
								'dblDownpaymentRate',
								'dblDownpaymentAmt',
								'boolIsPaid',
								'dtPaymentDate',
								'boolIsActive');


}