<?php


class tblMeasurementDetailsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblMeasurementDetail')->delete();

		$tblMeasurementDetail = array (
			array(

				'strMeasurementDetailID' => 'MDET001',
				'strMeasurementDetailName' => 'Slevee',		
				'strMeasurementDetailDesc' =>'For shoulder part of the polos.',
				'boolIsActive' => '1'

			),
			
			array(

				'strMeasurementDetailID' => 'MDET002',
				'strMeasurementDetailName' => 'Waist',
				'strMeasurementDetailDesc' =>'For waist line purposes.',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMeasurementDetail')->insert($tblMeasurementDetail);
		}
}

