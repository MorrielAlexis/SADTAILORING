<?php

class ReasonMaterialNeedle extends Eloquent {

	protected $table = 'TblReasonMaterialNeedle';
	protected $primaryKey = 'strInactiveNeedleID';
	protected $fillable = array('strInactiveNeedleID',
								'strInactiveReason');


}
