<?php


class tblMaterialZippersSeeder extends Seeder{
	
	public function run() {
		DB::table('TblMaterialZipper')->delete();

		$TblMaterialZipper = array (
			array(

				'strMaterialZipperID' => 'ZIP001',
				'strMaterialZipperName' => 'Zigzag',
				'strMaterialZipperSize' => 'Small',
				'strMaterialZipperColor' => 'Gray',
				'strMaterialZipperDesc' => 'For Pants',
				'strMaterialZipperImage' => '',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialZipperID' => 'ZIP002',
				'strMaterialZipperName' => 'Straight',
				'strMaterialZipperSize' => 'Medium',
				'strMaterialZipperColor' => 'blue',
				'strMaterialZipperDesc' => 'Zipper for pockets',
				'strMaterialZipperImage' =>'',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('TblMaterialZipper')->insert($TblMaterialZipper);
		}
}

