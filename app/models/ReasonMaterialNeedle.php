<?php

class ReasonMaterialNeedle extends Eloquent {

	protected $table = 'tblReasonMaterialNeedle';
	protected $primaryKey = 'strInactiveNeedleID';
	protected $fillable = array('strInactiveNeedleID',
								'strInactiveReason');


}
