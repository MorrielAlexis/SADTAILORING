<?php

class ReasonMaterialHookAndEye extends Eloquent {

	protected $table = 'tblReasonMaterialHookAndEye';
	protected $primaryKey = 'strInactiveHookID';
	protected $fillable = array('strInactiveHookID',
								'strInactiveReason');


}
