<?php

class ReasonSwatches extends Eloquent {

	protected $table = 'tblReasonSwatches';
	protected $primaryKey = 'strInactiveSwatchID';
	protected $fillable = array('strInactiveSwatchID',
								'strInactiveReason');


}
