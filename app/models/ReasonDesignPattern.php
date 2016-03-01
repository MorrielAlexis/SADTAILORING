<?php

class ReasonDesignPattern extends Eloquent {

	protected $table = 'TblReasonDesignPattern';
	protected $primaryKey = 'strInactivePatternID';
	protected $fillable = array('strInactivePatternID',
								'strInactiveReason');


}
