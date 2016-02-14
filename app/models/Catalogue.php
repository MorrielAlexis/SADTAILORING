<?php

class Catalogue extends Eloquent{
	

	protected $table = 'tblCatalogue';
	protected $primaryKey = 'strCatalogueID';
	protected $fillable = array('strCatalogueID',
								'strCatalogueCategory',
								'strCatalogueName',
								'txtCatalogueDesc',
								'strCatalogueImage',
								'boolIsActive');


}