<?php


class tblMaterialThreadsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblMaterialThread')->delete();

		$tblMaterialThread = array (
			array(

				'strMaterialThreadID' => 'THR001',
				'strMaterialThreadName' => 'Coats Metallic',
				'strMaterialThreadColor' =>'Silver',
				'strMaterialThreadDesc' => 'Used for theatrical costumes and other events.',
				'strMaterialThreadImage' => 'imgMaterialThreads/coats metallic.jpg',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialThreadID' => 'THR002',
				'strMaterialThreadName' => 'Rayon',
				'strMaterialThreadColor' =>'Red',
				'strMaterialThreadDesc' => 'For normal clothes',
				'strMaterialThreadImage' => 'imgMaterialThreads/rayon thread.jpg',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMaterialThread')->insert($tblMaterialThread);
		}
}

