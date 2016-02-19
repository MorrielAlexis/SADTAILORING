<?php


class tblMeasurementHeadersSeeder extends Seeder{
	
	public function run() {
		DB::table('tblMeasurementHeader')->delete();

		$tblMeasurementHeader = array (
			array(

				'strMeasurementID' => 'MEAS001',
				'strCategoryName' => 'GARM001',		
				'strSegmentName' =>'SEGM001',
				'strMeasurementName' => 'MDET001',
				'boolIsActive' => '1'

			),
			
			array(

				'strMeasurementID' => 'MEAS002',
				'strCategoryName' => 'GARM001',
				'strSegmentName' =>'SEGM001',
				'strMeasurementName' => 'MDET002',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMeasurementHeader')->insert($tblMeasurementHeader);
		}
}

