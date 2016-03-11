<?php


class tblUsersSeeder extends Seeder{
	
	public function run() {
		DB::table('tblUser')->delete();

		$tblUser = array (
			array(

				'strUserID' => 'USER001',
				'strPassword' => 'pass001',
				'strLoginEmpID' => 'EMPL001'

			)

	);

	
		DB::table('tblUser')->insert($tblUser);
		}
}