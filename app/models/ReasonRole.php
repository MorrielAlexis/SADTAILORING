<?php

class ReasonRole extends Eloquent {

	protected $table = 'TblReasonRole';
	protected $primaryKey = 'strInactiveRoleID';
	protected $fillable = array('strInactiveRoleID',
								'strInactiveReason');


}
