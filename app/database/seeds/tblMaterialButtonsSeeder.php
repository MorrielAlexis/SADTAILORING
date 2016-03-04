<?php


class tblMaterialButtonsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblMaterialButton')->delete();

		$tblMaterialButton = array (
			array(

				'strMaterialButtonID' => 'BUTS001',
				'strMaterialButtonName' => 'Double Header',
				'strMaterialButtonSize' => 'Small',
				'strMaterialButtonColor' => 'Gray',
				'strMaterialButtonDesc' => 'Two wholes with extra lining',
				'strMaterialButtonImage' => '',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialButtonID' => 'BUTS002',
				'strMaterialButtonName' => 'Simple Buts',
				'strMaterialButtonSize' => 'Medium',
				'strMaterialButtonColor' => 'blue',
				'strMaterialButtonDesc' => '3 holes wholes with extra lining',
				'strMaterialZipperImage' =>'',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMaterialButton')->insert($tblMaterialButton);
		}
}

