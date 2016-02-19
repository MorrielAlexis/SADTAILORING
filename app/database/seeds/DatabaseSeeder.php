<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('tblEmployeeRolesSeeder');
		$this->call('tblEmployeesSeeder');
		$this->call('tblCustPrivateIndividualsSeeder');
		$this->call('tblCustCompaniesSeeder');
		$this->call('tblGarmentCategoriesSeeder');
		$this->call('tblGarmentSegmentsSeeder');

		
		
	}

}
