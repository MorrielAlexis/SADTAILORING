<?php

class ReasonGarmentCategory extends Eloquent {

	protected $table = 'tblReasonGarmentCategory';
	protected $primaryKey = 'strInactiveGarmentID';
	protected $fillable = array('strInactiveGarmentID',
								'strInactiveReason');


}
