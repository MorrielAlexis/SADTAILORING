<?php

class User extends Eloquent {

	//public $incrementing = false;
	protected $table = 'tblUser';
	protected $primaryKey = 'strUserID';
	protected $fillable = array('strUserID',
								'strPassword',
								'strLoginEmpID');


}