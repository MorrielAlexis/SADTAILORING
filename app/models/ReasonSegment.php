<?php

class ReasonSegment extends Eloquent {

	protected $table = 'TblReasonSegment';
	protected $primaryKey = 'strInactiveSegmentID';
	protected $fillable = array('strInactiveSegmentID',
								'strInactiveReason');


}
