<?php


class tblMaterialZippersSeeder extends Seeder{
	
	public function run() {
		DB::table('tblMaterialZipper')->delete();

		$tblMaterialZipper = array (
			array(

				'strMaterialZipperID' => 'ZIP001',
				'strMaterialZipperName' => 'Zigzag',
				'strMaterialZipperSize' => 'Small',
				'strMaterialZipperColor' => 'Gray',
				'strMaterialZipperDesc' => 'For Pants',
				'strMaterialZipperImage' => 'imgMaterialZippers/Zipper-2.jpg',
				'boolIsActive' => '1'

			),
			
			array(

				'strMaterialZipperID' => 'ZIP002',
				'strMaterialZipperName' => 'Straight',
				'strMaterialZipperSize' => 'Medium',
				'strMaterialZipperColor' => 'Blue',
				'strMaterialZipperDesc' => 'Zipper for pockets',
				'strMaterialZipperImage' =>'imgMaterialZippers/Zipper-1.jpg',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblMaterialZipper')->insert($tblMaterialZipper);
		}
}

