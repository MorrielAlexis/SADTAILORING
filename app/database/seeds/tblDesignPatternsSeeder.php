<?php


class tblDesignPatternsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblDesignPattern')->delete();

		$tblDesignPattern = array (
			array(

				'strDesignPatternID' => 'SPAT001',
				'strDesignCategory' => 'GARM001',
				'strDesignSegmentName' => 'SEGM001',		
				'strPatternName' =>'Pencil Cut',
				'strPatternImage' => 'imgDesignPatterns/pencil cut.jpg',
				'boolIsActive' => '1'

			),
			
			array(

				'strDesignPatternID' => 'SPAT002',
				'strDesignCategory' => 'GARM001',
				'strDesignSegmentName' => 'SEGM001',
				'strPatternName' =>'Slim Fit',
				'strPatternImage' => 'imgDesignPatterns/Chinos.jpg',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblDesignPattern')->insert($tblDesignPattern);
		}
}

