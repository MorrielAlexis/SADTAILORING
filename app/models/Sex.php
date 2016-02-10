<?php

class Sex extends Eloquent {

	protected $table = 'tblSex';
	protected $primaryKey = 'intSexID';
	protected $fillable = array('strsSexName');


	public function sex() {

		return $this->hasMany('PrivateIndividual', 'Employee');
	}
}