<?php


class tblUsersSeeder extends Seeder{
	
	public function run() {
		DB::table('tblUser')->delete();

		$tblUser = array (
			array(

				'strUserID' => 'USER-A-001',
				'strPassword' => 'pass001',
				'strLoginEmpID' => 'EMPL001'

			),
			
			array(

				'strUserID' => 'USER-M-002',
				'strPassword' => 'pass002',
				'strLoginEmpID' => 'EMPL002'
			)

	);

	
		DB::table('tblUser')->insert($tblUser);
		}
}