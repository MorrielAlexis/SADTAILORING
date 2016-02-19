<?php


class tblGarmentCategoriesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblGarmentCategory')->delete();

		$tblGarmentCategory = array (
			array(

				'strGarmentCategoryID' => 'GARM001',
				'strGarmentCategoryName' => 'Uniforms',
				
				'strGarmentCategoryDesc' =>'Custom made uniforms for male and female.',

				'boolIsActive' => '1'

			),
			
			array(

				'strGarmentCategoryID' => 'GARM002',
				'strGarmentCategoryName' => 'Tuxedo',
				'strGarmentCategoryDesc' =>'Formal essential for men.',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblGarmentCategory')->insert($tblGarmentCategory);
		}
}

