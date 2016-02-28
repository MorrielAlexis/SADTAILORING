<?php


class tblEmployeesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblEmployee')->delete();

		$tblEmployee = array (
			array(

				'strEmployeeID' => 'EMPL001',
				'strEmpFName' => 'Earvin',
				'strEmpMName' => 'Aquino',
				'strEmpLName' => 'Tolentino',
				'dtEmpBday' =>'1996-07-02',
				'strSex' => 'Male',
				'strEmpAddress' => '44 Rizal St.,Mandaluyong City',
				'strRole' => 'ROLE001',
				'strCellNo'=>'09162451291',
				'strPhoneNo' => '02345890',
				'strEmailAdd' => 'earvintol@gmail.com',
				'boolIsActive' => '1'

			),
			
			array(

				'strEmployeeID' => 'EMPL002',
				'strEmpFName' => 'Amber',
				'strEmpMName' => 'Aquino',
				'strEmpLName' => 'Lastima',
				'dtEmpBday' =>'2000-08-04',
				'strSex' => 'Female',
				'strEmpAddress' => 'Signal Village, Taguig City',
				'strRole' => 'ROLE002',
				'strCellNo'=>'09197864523',
				'strPhoneNo'=> '02345890',
				'strEmailAdd' => 'amberaq@gmail.com',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblEmployee')->insert($tblEmployee);
		}
}

