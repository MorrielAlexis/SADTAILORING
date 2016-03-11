<?php


class tblMaterialNeedlesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblMaterialNeedle')->delete();

		$tblMaterialNeedle = array (
			array(

				'strMaterialNeedleID' => 'NED001',
				'strMaterialNeedleName' => 'Classic Big',
				'strMaterialNeedleSize' => 'Big',
				'strMaterialNeedleDesc' => 'For large comforters',
				'strMaterialNeedleImage' =>'imgMaterialNeedles/big needle.jpg',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialNeedleID' => 'NED002',
				'strMaterialNeedleName' => 'Sharp Classic',
				'strMaterialNeedleSize' => 'Small',
				'strMaterialNeedleDesc' => 'For mass production',
				'strMaterialNeedleImage' =>'imgMaterialNeedles/small needle.jpg',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMaterialNeedle')->insert($tblMaterialNeedle);
		}
}

