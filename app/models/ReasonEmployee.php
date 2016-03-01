<?php

class ReasonEmployee extends Eloquent {

	protected $table = 'TblReasonEmployee';
	protected $primaryKey = 'strInactiveEmployeeID';
	protected $fillable = array('strInactiveEmployeeID',
								'strInactiveReason');


}
