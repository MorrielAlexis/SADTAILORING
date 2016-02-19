<?php


class tblFabricTypesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblFabricType')->delete();

		$tblFabricType = array (
			array(

				'strFabricTypeID' => 'FAB001',
				'strFabricTypeName' => 'Linen',
				'strFabricTypeDesc' =>'Use for making lapels in tuxedo.',
				'boolIsActive' => '1'

			),
			
			array(

				'strFabricTypeID' => 'FAB002',
				'strFabricTypeName' => 'Cotton',
				'strFabricTypeDesc' =>'Use in almost all classes of shirt.',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblFabricType')->insert($tblFabricType);
		}
}

