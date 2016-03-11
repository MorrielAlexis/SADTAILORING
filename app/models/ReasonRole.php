<?php

class ReasonRole extends Eloquent {

	protected $table = 'tblReasonRole';
	protected $primaryKey = 'strInactiveRoleID';
	protected $fillable = array('strInactiveRoleID',
								'strInactiveReason');


}
