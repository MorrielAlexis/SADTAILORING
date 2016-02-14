<?php

class PrivateIndividual extends Eloquent {

	// public $incrementing = false;
	protected $table = 'tblCustPrivateIndividual';
	protected $primaryKey = 'strCustPrivIndivID';
	protected $fillable = array('strCustPrivIndivID',
								'strCustPrivFName',
								'strCustPrivLName',
								'strCustPrivAddress',
								'strCustPrivLandlineNumber',
								'strCustPrivCPNumber',
								'strCustPrivEmailAddress',
								'boolIsActive');

/*
	public function privateIndividual() {

		return $this->belongsTo('Customer');
	}*/


}