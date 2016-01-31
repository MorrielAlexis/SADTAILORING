<?php

class CustomerProfileCompany extends Eloquent
{
	protected $table = 'tblCustomerProfileCompanies';
	protected $primaryKey = 'strCustProfComID'
	protected $fillable = array('strCustProfComName','strCustProfComAddress','strCustProfComDesc','strCustProfComEmail','strCustProfComCellNo', 'strCustProfComPhoneNo', 'strCustProfComFax', 'strCustProfComContactPerson');
		
}