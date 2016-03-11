<?php


class tblMaterialHookandEyesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblMaterialHookAndEye')->delete();

		$tblMaterialHookAndEye = array (
			array(

				'strMaterialHookID' => 'HK001',
				'strMaterialHookName' => 'Skirt Hook',
				'strMaterialHookSize' => 'Small',
				'strMaterialHookColor' => 'Black',
				'strMaterialHookImage' => 'imgMaterialHooks/skirthookandeye-1.jpg',
				'strMaterialHookDesc'=> 'Use for skirt and dress',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialHookID' => 'HK002',
				'strMaterialHookName' => 'Pants Hook',
				'strMaterialHookSize' => 'Medium',
				'strMaterialHookColor' => 'Silver',
				'strMaterialHookImage' =>'imgMaterialHooks/skirthookandeye-5.jpg',
				'strMaterialHookDesc'=> 'Use for pants',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMaterialHookAndEye')->insert($tblMaterialHookAndEye);
		}
}

