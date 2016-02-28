<?php


class tblMaterialHookandEyesSeeder extends Seeder{
	
	public function run() {
		DB::table('TblMaterialHookAndEye')->delete();

		$TblMaterialHookAndEye = array (
			array(

				'strMaterialHookID' => 'HK001',
				'strMaterialHookName' => 'Skirt Hook',
				'strMaterialHookSize' => 'Small',
				'strMaterialHookColor' => 'Gray',
				'strMaterialHookImage' => '',
				'strMaterialHookDesc'=> 'Use for skirt and dress',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialHookID' => 'HK002',
				'strMaterialHookName' => 'Pants Hook',
				'strMaterialHookSize' => 'Medium',
				'strMaterialHookColor' => 'blue',
				'strMaterialHookImage' =>'',
				'strMaterialHookDesc'=> 'Use for pants',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('TblMaterialHookAndEye')->insert($TblMaterialHookAndEye);
		}
}

