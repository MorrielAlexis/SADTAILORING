<?php


class tblMaterialThreadsSeeder extends Seeder{
	
	public function run() {
		DB::table('TblMaterialThread')->delete();

		$TblMaterialThread = array (
			array(

				'strMaterialThreadID' => 'THR001',
				'strMaterialThreadName' => 'Maong Brown',
				'strMaterialThreadColor' =>'Brown',
				'strMaterialThreadDesc' => 'For accent',
				'strMaterialThreadImage' => '',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialThreadID' => 'THR002',
				'strMaterialThreadName' => 'Cotton Hard',
				'strMaterialThreadColor' =>'Gray',
				'strMaterialThreadDesc' => 'For design',
				'strMaterialThreadImage' => '',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('TblMaterialThread')->insert($TblMaterialThread);
		}
}

