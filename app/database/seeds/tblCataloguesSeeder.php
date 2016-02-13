<?php


class tblCataloguesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblCatalogue')->delete();

		$tblCatalogue = array (
			array(

				'strCatalogueID' => 'CAT001',
				'strCatalogueCategory' => 'GARM001',
				'strCatalogueName' =>'JS Promenade Dress',
				'strCatalogueDesc'=>'Clothing for promenade and special events.',
				'strCatalogueImage'=>'',
				'boolIsActive' => '1'

			),
			
			array(

				'strCatalogueID' => 'CAT002',
				'strCatalogueCategory' => 'GARM001',
				'strCatalogueName' =>'Conference Formal Attire',
				'strCatalogueDesc'=>'Use by men for formal events.',
				'strCatalogueImage'=>'',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblCatalogue')->insert($tblCatalogue);
		}
}

