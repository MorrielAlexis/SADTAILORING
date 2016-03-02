<?php

class ReasonMaterialButton extends Eloquent {

	protected $table = 'TblReasonMaterialButton';
	protected $primaryKey = 'strInactiveButtonID';
	protected $fillable = array('strInactiveButtonID',
								'strInactiveReason');


}
