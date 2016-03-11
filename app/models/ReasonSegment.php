<?php

class ReasonSegment extends Eloquent {

	protected $table = 'tblReasonSegment';
	protected $primaryKey = 'strInactiveSegmentID';
	protected $fillable = array('strInactiveSegmentID',
								'strInactiveReason');


}
