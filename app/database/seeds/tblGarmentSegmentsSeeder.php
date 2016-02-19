<?php


class tblGarmentSegmentsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblGarmentSegment')->delete();

		$tblGarmentSegment = array (
			array(

				'strGarmentSegmentID' => 'SEGM001',
				'strCategory' => 'GARM001',		
				'strGarmentSegmentName' =>'Skirt',
				'strGarmentSegmentDesc' => 'Pangibabang kasuotan sa babae.',
				'boolIsActive' => '1'

			),
			
			array(

				'strGarmentSegmentID' => 'SEGM002',
				'strCategory' => 'GARM002',
				'strGarmentSegmentName' =>'Coat',
				'strGarmentSegmentDesc' => 'Upper part wear for men.',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblGarmentSegment')->insert($tblGarmentSegment);
		}
}

