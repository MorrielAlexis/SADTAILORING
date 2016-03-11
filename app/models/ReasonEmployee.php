<?php

class ReasonEmployee extends Eloquent {

	protected $table = 'tblReasonEmployee';
	protected $primaryKey = 'strInactiveEmployeeID';
	protected $fillable = array('strInactiveEmployeeID',
								'strInactiveReason');


}
