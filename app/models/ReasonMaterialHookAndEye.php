<?php

class ReasonMaterialHookAndEye extends Eloquent {

	protected $table = 'TblReasonMaterialHookAndEye';
	protected $primaryKey = 'strInactiveHookID';
	protected $fillable = array('strInactiveHookID',
								'strInactiveReason');


}
