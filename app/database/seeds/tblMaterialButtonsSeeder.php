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
				'strMaterialButtonImage' => 'imgMaterialButtons/a22-1002.jpg',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialButtonID' => 'BUTS002',
				'strMaterialButtonName' => 'Cyclic Button',
				'strMaterialButtonSize' => 'Medium',
				'strMaterialButtonColor' => 'White',
				'strMaterialButtonDesc' => '2 holes wholes with extra circular lining',
				'strMaterialButtonImage' =>'imgMaterialButtons/a22-1004',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMaterialButton')->insert($tblMaterialButton);
		}
}

