<?php


class tblSwatchesSeeder extends Seeder{
	
	public function run() {
		DB::table('TblSwatches')->delete();

		$TblSwatches = array (
			array(

				'strSwatchID' => 'SW001',
				'strSwatchFabricTypeName' => 'FAB001',
				'strSwatchName' =>'Linen Keme',
				'strSwatchCode' =>'LINK01',
				'strSwatchImage' =>'',

				'boolIsActive' => '1'

			),
			
			array(

				'strSwatchID' => 'SW002',
				'strSwatchFabricTypeName' => 'FAB002',
				'strSwatchName' =>'Cotton Keme',
				'strSwatchCode' =>'CKJK01',
				'strSwatchImage' =>'',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('TblSwatches')->insert($TblSwatches);
		}
}

