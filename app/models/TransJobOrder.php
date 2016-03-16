<?php

class TransJobOrder extends Eloquent{
	

	protected $table = 'tblJobOrder';
	protected $primaryKey = 'strJobDescriptionID';
	protected $fillable = array('strJobOrderID',
								'strJobDescID',
								'strCustomerID',
								'strTermsPaymentID',
								'strCustomerType',
								'intOrderQuantity',
								'dtOrderDate',
								'dtRequiredDate',
								'dtDeliveryDate',
								'boolIsFinished',
								'boolIsActive');


}