<?php

class tblEmployeeRolesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblEmployeeRole')->delete();

		$tblEmployeeRole = array (
			array(

				'strEmpRoleID' => 'ROLE001',
				'strEmpRoleName' => 'Production Manager',
				'strEmpRoleDesc' => 'In charge in overall production of transaction.',
				'boolIsActive' => 1
			),

			array(

				'strEmpRoleID' => 'ROLE002',
				'strEmpRoleName' => 'Sewer',
				'strEmpRoleDesc' => 'In charge the manufacturing of garments.',
				'boolIsActive' => 1
			),

			array(

				'strEmpRoleID' => 'ROLE003',
				'strEmpRoleName' => 'Cutter',
				'strEmpRoleDesc' => 'In charge in pattern making of garments.',
				'boolIsActive' => 1
			)
			
		);

	
		DB::table('tblEmployeeRole')->insert($tblEmployeeRole);
	}
}