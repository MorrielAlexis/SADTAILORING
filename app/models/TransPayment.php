<?php

class TransPayment extends Eloquent{
	

	protected $table = 'tblPayment';
	protected $primaryKey = 'strPaymentID';
	protected $fillable = array('strPaymentID',
								'strPaymentJobOrderID',
								'strPaymentType',
								'dblAmountPaid',
								'dblBalance',
								'dblAmountTendered',
								'boolIsPaid',
								'dtPaymentDate',
								'boolIsActive');


}