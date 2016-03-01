<?php

class ReasonCatalogue extends Eloquent {

	protected $table = 'TblReasonCatalogue';
	protected $primaryKey = 'strInactiveCatalogueID';
	protected $fillable = array('strInactiveCatalogueID',
								'strInactiveReason');


}
