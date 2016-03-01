<?php

class ReasonGarmentCategory extends Eloquent {

	protected $table = 'TblReasonGarmentCategory';
	protected $primaryKey = 'strInactiveGarmentID';
	protected $fillable = array('strInactiveGarmentID',
								'strInactiveReason');


}
