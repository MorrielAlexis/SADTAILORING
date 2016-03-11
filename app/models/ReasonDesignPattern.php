<?php

class ReasonDesignPattern extends Eloquent {

	protected $table = 'tblReasonDesignPattern';
	protected $primaryKey = 'strInactivePatternID';
	protected $fillable = array('strInactivePatternID',
								'strInactiveReason');


}
