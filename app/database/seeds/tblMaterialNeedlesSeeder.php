<?php


class tblMaterialNeedlesSeeder extends Seeder{
	
	public function run() {
		DB::table('TblMaterialNeedle')->delete();

		$TblMaterialNeedle = array (
			array(

				'strMaterialNeedleID' => 'NED001',
				'strMaterialNeedleName' => 'Ballpoint',
				'strMaterialNeedleSize' => 'Small',
				'strMaterialNeedleDesc' => 'For embroidery',
				'strMaterialNeedleImage' =>'',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialNeedleID' => 'THR002',
				'strMaterialNeedleName' => 'Sharp',
				'strMaterialNeedleSize' => 'Medium',
				'strMaterialNeedleDesc' => 'For mass production',
				'strMaterialNeedleImage' =>'',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('TblMaterialNeedle')->insert($TblMaterialNeedle);
		}
}

