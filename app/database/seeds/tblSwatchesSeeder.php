<?php


class tblSwatchesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblSwatches')->delete();

		$tblSwatches = array (
			array(

				'strSwatchID' => 'SW001',
				'strSwatchFabricTypeName' => 'FAB001',
				'strSwatchName' =>'Linen Antique',
				'strSwatchCode' =>'LINK01',
				'strSwatchImage' =>'imgSwatches/linen keme.jpg',

				'boolIsActive' => '1'

			),
			
			array(

				'strSwatchID' => 'SW002',
				'strSwatchFabricTypeName' => 'FAB002',
				'strSwatchName' =>'Cotton Classic',
				'strSwatchCode' =>'CKJK01',
				'strSwatchImage' =>'imgSwatches/cotton sample.jpg',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblSwatches')->insert($tblSwatches);
		}
}

