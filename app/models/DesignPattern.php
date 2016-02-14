<?php

class DesignPattern extends Eloquent {

	protected $table = 'tblDesignPattern';
	protected $primaryKey = 'strDesignPatternID';
	protected $fillable = array('strDesignPatternID',
								 'strSegmentName',
								 'strPatternName',
								 'strPatternImage',
								  'boolIsActive');

	
}