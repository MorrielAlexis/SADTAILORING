<?php

class Gender extends Eloquent {

	protected $table = 'tblGender';
	protected $primaryKey = 'intGenderID';
	protected $fillable = array('strGenderName');


	public function gender() {

		return $this->hasMany('PrivateIndividual', 'Employee');
	}
}