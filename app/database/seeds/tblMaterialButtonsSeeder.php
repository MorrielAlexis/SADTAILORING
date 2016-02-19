<?php


class tblMaterialButtonsSeeder extends Seeder{
	
	public function run() {
		DB::table('TblMaterialButton')->delete();

		$TblMaterialButton = array (
			array(

				'strMaterialButtonID' => 'BUTS001',
				'strMaterialButtonName' => 'Zigzag',
				'strMaterialButtonSize' => 'Small',
				'strMaterialButtonColor' => 'Gray',
				'strMaterialButtonImage' => '',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialButtonID' => 'BUTS002',
				'strMaterialButtonName' => 'Straight',
				'strMaterialButtonSize' => 'Medium',
				'strMaterialButtonColor' => 'blue',
				'strMaterialNeedleImage' =>'',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('TblMaterialButton')->insert($TblMaterialButton);
		}
}

