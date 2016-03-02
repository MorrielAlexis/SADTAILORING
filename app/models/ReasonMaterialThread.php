<?php

class ReasonMaterialThread extends Eloquent {

	protected $table = 'TblReasonMaterialThread';
	protected $primaryKey = 'strInactiveThreadID';
	protected $fillable = array('strInactiveThreadID',
								'strInactiveReason');


}
