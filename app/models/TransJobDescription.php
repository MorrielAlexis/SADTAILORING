<?php

class TransJobDescription extends Eloquent{
	

	protected $table = 'tblJobDescription';
	protected $primaryKey = 'strJobDescriptionID';
	protected $fillable = array('strJobDescriptionID',
								'strJobName',
								'strJobDescription',
								'boolIsActive');


}