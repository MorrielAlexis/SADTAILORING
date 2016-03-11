<?php

class ReasonMaterialThread extends Eloquent {

	protected $table = 'tblReasonMaterialThread';
	protected $primaryKey = 'strInactiveThreadID';
	protected $fillable = array('strInactiveThreadID',
								'strInactiveReason');


}
