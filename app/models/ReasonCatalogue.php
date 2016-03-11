<?php

class ReasonCatalogue extends Eloquent {

	protected $table = 'tblReasonCatalogue';
	protected $primaryKey = 'strInactiveCatalogueID';
	protected $fillable = array('strInactiveCatalogueID',
								'strInactiveReason');


}
