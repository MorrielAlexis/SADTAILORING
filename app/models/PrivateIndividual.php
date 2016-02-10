<?php

class PrivateIndividual extends Eloquent {

	public $incrementing = false;
	protected $table = 'tblCustPrivateIndividual';
	protected $primaryKey = 'strCustPrivIndivID';
	protected $fillable = array('strCustFName',
								'strCustLName',
								'strSex',
								'strCustAddress',
								'strCustEmailAddress',
								'strCustPhoneNumber',
								'strCustLandlineNumber');

/*
	public function privateIndividual() {

		return $this->belongsTo('Customer');
	}*/


}