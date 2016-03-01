<?php

class ReasonSwatches extends Eloquent {

	protected $table = 'TblReasonSwatches';
	protected $primaryKey = 'strInactiveSwatchID';
	protected $fillable = array('strInactiveSwatchID',
								'strInactiveReason');


}
