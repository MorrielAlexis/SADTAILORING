<?php

class PrivateIndividual extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblCustPrivateIndividual';
	protected $primaryKey = 'strCustPrivIndivID';
	protected $fillable = array('strCustPrivIndivID',
								'strCustPrivFName',
								'strCustPrivMName', 
								'strCustPrivLName',
								'strCustPrivAddress',
								'strCustPrivLandlineNumber',
								'strCustPrivCPNumber',
								'strCustPrivCPNumberAlt',
								'strCustPrivEmailAddress',
								'boolIsActive');

/*
	public function privateIndividual() {

		return $this->belongsTo('Customer');
	}*/


}